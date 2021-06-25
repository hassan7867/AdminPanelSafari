<?php

namespace App\Http\Controllers;

use App\AccommodationAndMeal;
use App\Bid;
use App\CancelAutoRenew;
use App\CertificateFiles;
use App\Certificates;
use App\CompanyDestinations;
use App\CompanyOffice;
use App\Exclusions;
use App\Inclusions;
use App\Rates;
use App\ReviewsTable;
use App\Routes;
use App\Subscription;
use App\TourActivities;
use App\TourFeatures;
use App\TourPhotos;
use App\Tours;
use App\User;
use App\UserCardDetails;
use App\UserTokens;
use Firebase\JWT\JWT;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use services\email_messages\BidMessage;
use services\email_messages\ForgotPasswordMessage;
use services\email_messages\ResetPassword;
use services\email_messages\WorkProtected;
use services\email_services\EmailAddress;
use services\email_services\EmailBody;
use services\email_services\EmailMessage;
use services\email_services\EmailSender;
use services\email_services\EmailSubject;
use services\email_services\MailConf;
use services\email_services\PhpMail;
use services\email_services\SendEmailService;

class DashboardController extends Controller
{
    public function showTourIconOnLandingPage($tourId)
    {
        $file = Tours::where('id', $tourId)->first();
        $file = base_path('/data') . '/user-files' . '/' . $file->picture;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function customerPostPayment(Request $request)
    {
        try {

                    $stripe = \Cartalyst\Stripe\Laravel\Facades\Stripe::setApiKey(env('STRIPE_SECRET'));
                    $token = $stripe->tokens()->create([
                        'card' => [
                            'number' => $request->cardNumber,
                            'exp_month' => $request->expiryMonth,
                            'exp_year' => $request->expiryYear,
                            'cvc' => $request->cvv,
                        ],
                    ]);

                    if (!isset($token['id'])) {
                        return redirect()->back()->withErrors("Token Id does not Exists! Please try again!");
                    }

                    $charge = $stripe->charges()->create([
                        'card' => $token['id'],
                        'currency' => 'GBP',
                        'amount' => $request->totalAmount,
                        'description' => 'wallet',
                    ]);
                    if ($charge['status'] != 'succeeded') {
                        return redirect()->back()->withErrors("Error in your payment method! Please try again!");
                    }

                    $customerEmail  = $request->customerEmail;
                    $operatorId  = $request->operatorId;
                    $tourId  = $request->tourId;
                    $operator = User::where('id', $operatorId)->first();
                    $tour = Tours::where('id', $tourId)->first();
                    $bid = Bid::where('operator_id', $operatorId)->where('tour_id', $tourId)->first();
                    $bid->status = 'Booked';
                    $bid->update();

                    $subject = new SendEmailService(new EmailSubject("Your Tour is Booked on ". env('APP_NAME')));
                    $mailTo = new EmailAddress($customerEmail);
                    $invitationMessage = new BidMessage();
                    $operator = User::where('id', $bid->operator_id)->first();
                    $tourTitle = Tours::where('id', $bid->tour_id)->first()['title'];
                    $emailBody = $invitationMessage->bidBookedMessageToCustomer($operator, $tourTitle, $bid->amount);
                    $body = new EmailBody($emailBody);
                    $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
                    $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
                    $result = $sendEmail->send($emailMessage);

                    $subject = new SendEmailService(new EmailSubject("A customer booked your Tour on ". env('APP_NAME')));
                    $operator = User::where('id', $bid->operator_id)->first();
                    $mailTo = new EmailAddress($operator->email);
                    $invitationMessage = new BidMessage();
                    $tourTitle = Tours::where('id', $bid->tour_id)->first()['title'];
                    $bid3 = Bid::where('operator_id', $operatorId)->where('tour_id', $tourId)->first();
                    $emailBody = $invitationMessage->bidBookedMessageToOperator($tourTitle, $bid3);
                    $body = new EmailBody($emailBody);
                    $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
                    $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
                    $result = $sendEmail->send($emailMessage);

                return view('payment-success')->with(['operator' => $operator]);

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function tours()
    {
        $userId = Session::get('userId');
        $tours = Tours::where('user_id', $userId)->get();
        return view('dashboard.tours')->with(['tours' => $tours]);
    }

    public function bids()
    {
        $userId = Session::get('userId');
        $bids = Bid::where('operator_id', $userId)->get();
        return view('dashboard.bids')->with(['bids' => $bids]);
    }

    public function bookings()
    {
        $userId = Session::get('userId');
        $bids = Bid::where('operator_id', $userId)->whereIn('status', ['Booked', 'Completed'])->get();
        return view('dashboard.bookings')->with(['bids' => $bids]);
    }

    public function reviews()
    {
        $userId = Session::get('userId');
        $reviewsTable = ReviewsTable::all();
        return view('dashboard.reviews')->with(['reviews'=>$reviewsTable]);
    }

    public function rejectBid($bidId)
    {

        try{
            $bid = Bid::where('id', $bidId)->first();
            $bid->status = 'Rejected';
            $bid->update();
            $subject = new SendEmailService(new EmailSubject("Your Bid is Rejected on ". env('APP_NAME')));
            $mailTo = new EmailAddress($bid->email);
            $invitationMessage = new BidMessage();
            $operatorName = User::where('id', $bid->operator_id)->first()['company_name'];
            $tourTitle = Tours::where('id', $bid->tour_id)->first()['title'];
            $emailBody = $invitationMessage->bidMessageBody($operatorName, $tourTitle, $bid->amount);
            $body = new EmailBody($emailBody);
            $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
            $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
            $result = $sendEmail->send($emailMessage);
            session()->flash('msg', 'Bid Rejected Successfully!');
            return redirect()->back();
        }catch(\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function acceptBid($bidId)
    {
        try{
            $bid = Bid::where('id', $bidId)->first();
            $bid->status = 'Accepted';
            $bid->update();
            $subject = new SendEmailService(new EmailSubject("Your Bid is Accepted on ". env('APP_NAME')));
            $mailTo = new EmailAddress($bid->email);
            $invitationMessage = new BidMessage();
            $operatorName = User::where('id', $bid->operator_id)->first()['name'];
            $tourTitle = Tours::where('id', $bid->tour_id)->first()['title'];
            $jwt =JWT::encode(['customer_email' => $bid->email,'operator_id' => $bid->operator_id, 'tour_id' => $bid->tour_id], 'secret-2021');
            $emailBody = $invitationMessage->bidAcceptMessageBody($operatorName, $tourTitle, $bid->amount, $jwt);
            $body = new EmailBody($emailBody);
            $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
            $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
            $result = $sendEmail->send($emailMessage);
            session()->flash('msg', 'Bid Accepted Successfully!');
            return redirect()->back();
        }catch(\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

    }

    public function completedBid($bidId)
    {
        try{
            $bid = Bid::where('id', $bidId)->first();
            $bid->status = 'Completed';
            $bid->update();
            $subject = new SendEmailService(new EmailSubject("Your Tour is marked as Completed on ". env('APP_NAME')));
            $mailTo = new EmailAddress($bid->email);
            $invitationMessage = new BidMessage();
            $operator = User::where('id', $bid->operator_id)->first();
            $tourTitle = Tours::where('id', $bid->tour_id)->first()['title'];
            $jwt =JWT::encode(['customer_email' => $bid->email,'operator_id' => $bid->operator_id, 'tour_id' => $bid->tour_id], 'secret-2021');
            $emailBody = $invitationMessage->bidCompletedMessageBody($operator, $tourTitle, $bid->amount);
            $body = new EmailBody($emailBody);
            $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
            $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
            $result = $sendEmail->send($emailMessage);
            session()->flash('msg', 'Bid Completed Successfully!');
            return redirect()->back();
        }catch(\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

    }

    public function customerPayment($token)
    {
        $token = JWT::decode($token, 'secret-2021', array('HS256'));
        $customerEmail  = $token->customer_email;
        $operatorId  = $token->operator_id;
        $tourId  = $token->tour_id;
        $operator = User::where('id', $operatorId)->first();
        $tour = Tours::where('id', $tourId)->first();
        $bidAmount = Bid::where('operator_id', $operatorId)->where('tour_id', $tourId)->first()['amount'];
        return view('customer-payment')->with(['bidAmount' => $bidAmount,'tour' => $tour,'operator' => $operator,'customerEmail' => $customerEmail,'operatorId' => $operatorId,'tourId' => $tourId]);
    }

    public function dashboard()
    {
        $userId = Session::get('adminId');
        return view('dashboard.home');
    }

    public function showUploadNewWorkPage()
    {
        return view('dashboard.upload-new-work');
    }

    public function showMyProtectedWorksPage()
    {
        $certificates = Certificates::where('user_id', Session::get('userId'))->get();
        return view('dashboard.my-protected-works')->with(['certificates' => $certificates]);
    }

    public function deleteCertificate($id)
    {
        $certificates = Certificates::where('id', $id)->first();
        $certificateFiles = CertificateFiles::where('certificate_id', $certificates->id)->get();
        foreach ($certificateFiles as $file) {
            $file->delete();
        }
        $certificates->delete();

        //reviving token
        $token = UserTokens::where('user_id', Session::get('userId'))->first();
        $token->token = (int)$token->token + 1;
        $token->update();

        session()->flash('msg', 'Certificate deleted Successfully. Your token revived!');
        return redirect()->back();
    }

    public function addMoreTokens()
    {
        $userCard = UserCardDetails::where('user_id', Session::get('userId'))->first();
        return view('dashboard.add-more-tokens')->with(['cardNumber' => $userCard->card_number ?? '', 'month' => $userCard->expiry_month ?? '', 'year' => $userCard->expiry_year ?? '']);
    }

    public function saveNewToken(Request $request)
    {
        try {
            $userCard = UserCardDetails::where('user_id', Session::get('userId'))->first();
            $stripe = \Cartalyst\Stripe\Laravel\Facades\Stripe::setApiKey(env('STRIPE_SECRET'));
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $userCard->card_number,
                    'exp_month' => $userCard->expiry_month,
                    'exp_year' => $userCard->expiry_year,
                    'cvc' => $userCard->cvv,
                ],
            ]);

            if (!isset($token['id'])) {
                return redirect()->back()->withErrors("There is a problem with your Card!");
            }

            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => 'GBP',
                'amount' => $request->totalAmount,
                'description' => 'wallet',
            ]);
            if ($charge['status'] != 'succeeded') {
                return redirect()->back()->withErrors("Error in your payment method! Please try again!");
            }

            $token = UserTokens::where('user_id', Session::get('userId'))->first();
            $token->token = (int)$token->token + $request->certificateToken;
            $token->update();
            session()->flash('msg', 'Tokens Purchased Successfully!');
            return redirect()->back();

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);

        }
    }

    public function billing()
    {
        return view('dashboard.billing');
    }

    public function personalDetails()
    {
        $user = User::where('id', Session::get('userId'))->first();
        return view('dashboard.personal-details')->with(['user' => $user]);
    }

    public function saveProfileInfo(Request $request)
    {
        try {
            $user = User::where('id', Session::get('userId'))->first();
            $user->name = $request->name;
            $user->company_name = $request->companyName;
            $user->company_size = $request->companysize;
            $user->telephone = $request->telephone;
            $user->tourtype = $request->tourtype;
            $user->foundedin = $request->foundedin;
            $user->pricerange = $request->pricerange;
            $user->overview = $request->overview;
            $user->description = $request->description;

            if (!empty($request->password)) {
                if ($request->password != $request->conpassword) {
                    return redirect()->back()->withErrors(["Password Mismatch Error."]);
                } else {
                    $user->password = md5($request->password);
                }
            }

            if ($request->hasfile('profilepic')) {
                $files = $request->file('profilepic');
                foreach ($files as $file) {
                    $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/user-files' . '/', $name);
                    $user->profile_pic = $name;
                }
            }

            if ($request->hasfile('companyLogo')) {
                $files = $request->file('companyLogo');
                foreach ($files as $file) {
                    $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/user-files' . '/', $name);
                    $user->company_logo = $name;
                }
            }
            $result = $user->update();
            session()->flash('msg', 'Profile Updated Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function addTour(Request $request)
    {
        try {
            $tours = new Tours();
            $tours->user_id = Session::get('userId');
            $tours->title = $request->title;
            $tours->country_name = $request->tourCountry;
            $tours->price = $request->price;
            $tours->description = $request->description;
            $tours->total_days = $request->totalDays;
            $tours->game_drives = $request->gameDrives;
            $tours->getting_around = $request->gettingAround;
            $tours->back_to_airport = $request->backToAirport;

            if ($request->hasfile('pic')) {
                $files = $request->file('pic');
                foreach ($files as $file) {
                    $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/user-files' . '/', $name);
                    $tours->picture = $name;
                }
            }
            $tours->save();
            for ($i = 0; $i < (int)$request->totalDays; $i++) {
                if (!empty($request['routeDay' . $i]) && !empty($request['routeName' . $i])) {
                    $routes = new Routes();
                    $routes->tour_id = $tours->id;
                    $routes->route_day = $request['routeDay' . $i];
                    $routes->route_name = $request['routeName' . $i];
                    $routes->save();
                }
            }
            $featureList = $request->featuresList;
            foreach ($featureList as $item) {
                $tourFeatures = new TourFeatures();
                $tourFeatures->tour_id = $tours->id;
                $tourFeatures->feature_id = $item;
                $tourFeatures->save();
            }
            $activitiesList = $request->activitiesList;
            foreach ($activitiesList as $item) {
                $tourActivities = new TourActivities();
                $tourActivities->tour_id = $tours->id;
                $tourActivities->activity = $item;
                $tourActivities->save();
            }
            for ($j = 0; $j < (int)$request->totalDays; $j++) {
                if (!empty($request['accommodationDay' . $j]) && !empty($request['accommodationName' . $j]) && !empty($request['accommodationMeal' . $j])) {
                    $accommodationAndMeal = new AccommodationAndMeal();
                    $accommodationAndMeal->tour_id = $tours->id;
                    $accommodationAndMeal->day = $request['accommodationDay' . $j];
                    $accommodationAndMeal->accommodation = $request['accommodationName' . $j];
                    $accommodationAndMeal->meal = $request['accommodationMeal' . $j];
                    $accommodationAndMeal->save();
                }
            }

            for ($k = 0; $k < (int)$request->totalRates; $k++) {
                if (!empty($request['startDate' . $k]) && !empty($request['endDate' . $k])) {
                    $tourRates = new Rates();
                    $tourRates->tour_id = $tours->id;
                    $tourRates->start_date = $request['startDate' . $k];
                    $tourRates->end_date = $request['endDate' . $k];
                    $tourRates->solo_room = $request['solo' . $k];
                    $tourRates->two_people = $request['twoPeople' . $k];
                    $tourRates->three_people = $request['threePeople' . $k];
                    $tourRates->four_people = $request['fourPeople' . $k];
                    $tourRates->five_people = $request['fivePeople' . $k];
                    $tourRates->six_people = $request['sixPeople' . $k];
                    $tourRates->save();
                }
            }


            $inclusionList = $request->inclusionList;
            foreach ($inclusionList as $item) {
                $inclusions = new Inclusions();
                $inclusions->tour_id = $tours->id;
                $inclusions->included_name = $item;
                $inclusions->save();
            }
            $exclusionList = $request->exclusionList;
            foreach ($exclusionList as $item) {
                $exclusion = new Exclusions();
                $exclusion->tour_id = $tours->id;
                $exclusion->excluded_name = $item;
                $exclusion->save();
            }
            if ($request->hasfile('tourPic')) {
                $files = $request->file('tourPic');
                foreach ($files as $file) {
                    $name = rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/user-files' . '/', $name);
                    $tourPhotos = new TourPhotos();
                    $tourPhotos->tour_id = $tours->id;
                    $tourPhotos->photo = $name;
                    $tourPhotos->save();
                }
            }
            session()->flash('msg', 'Tour Added Successfully!');
            return redirect('tours');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function manageOffices()
    {
        $userId = Session::get('userId');
        $offices = CompanyOffice::where('user_id', $userId)->get();
        return view('dashboard.manage-offices')->with(['offices' => $offices]);
    }

    public function manageDestinations()
    {
        $userId = Session::get('userId');
        $destinations = CompanyDestinations::where('user_id', $userId)->get();
        return view('dashboard.manage-destinations')->with(['destinations' => $destinations]);
    }

    public function deleteOffice($id)
    {
        try {
            $office = CompanyOffice::where('id', $id)->delete();
            session()->flash('msg', 'Office deleted Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function deleteDestination($id)
    {
        try {
            $of = CompanyDestinations::where('id', $id)->delete();
            session()->flash('msg', 'Destination deleted Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function addNewOffice(Request $request)
    {
        try {
            $office = new CompanyOffice();
            $office->address = $request->addressLineOne . $request->addressLineTwo;
            $office->city = $request->city;
            $office->postal_code = $request->postalCode;
            $office->state = $request->country;
            $office->country = $request->selectCountry;
            $office->user_id = Session::get('userId');
            $office->save();
            session()->flash('msg', 'Office added Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function addNewDestination(Request $request)
    {
        try {
            $destinationslist = $request->destinationslist;
            foreach ($destinationslist as $item) {
                $destinations = new CompanyDestinations();
                $destinations->country = $item;
                $destinations->user_id = Session::get('userId');
                $destinations->save();
            }
            session()->flash('msg', 'Destination added Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }


    public function updateCardInfo(Request $request)
    {
        try {
            $stripe = \Cartalyst\Stripe\Laravel\Facades\Stripe::setApiKey(env('STRIPE_SECRET'));
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->cardNumber,
                    'exp_month' => $request->expiryMonth,
                    'exp_year' => $request->expiryYear,
                    'cvc' => $request->cvv,
                ],
            ]);

            if (!isset($token['id'])) {
                return redirect()->back()->withErrors("Invalid Card! Please try again!");
            }
            $userCardDetails = UserCardDetails::where('user_id', Session::get('userId'))->first();
            $userCardDetails->card_holder_name = $request->cardHolderName;
            $userCardDetails->card_number = $request->cardNumber;
            $userCardDetails->expiry_month = $request->expiryMonth;
            $userCardDetails->expiry_year = $request->expiryYear;
            $userCardDetails->cvv = $request->cvv;
            $result = $userCardDetails->update();
            session()->flash('msg', 'Card Updated Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

    public function cancelAutoRenew()
    {
        $cancelAuto = new CancelAutoRenew();
        $cancelAuto->user_id = Session::get('userId');
        $cancelAuto->save();
        return redirect()->back();
    }

    public function turnOnAutoRenew()
    {
        $cancelAuto = CancelAutoRenew::where('user_id', Session::get('userId'))->first();
        $cancelAuto->delete();
        return redirect()->back();
    }

    public function viewCertificate($id)
    {
        $certificate = Certificates::where('id', $id)->first();
        $certificate->files = CertificateFiles::where('certificate_id', $certificate->id)->get();
        $certificate->user = User::where('id', $certificate->user_id)->first();
        return view('dashboard.view-certificate')->with(['certificate' => $certificate]);
    }

    function getIPAddress()
    {
        //whether ip is from the share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } //whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } //whether ip is from the remote address
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function resetCertificatePassword(Request $request)
    {
        try {
            if ($request->password == '') {
                return redirect()->back()->withErrors(["Password Required."]);
            }
            if ($request->password != $request->conpassword) {
                return redirect()->back()->withErrors(["Password Mismatch Error."]);
            }
            $certificate = Certificates::where('id', $request->certificateId)->first();
            $certificate->password = $request->password;
            $certificate->update();

            $user = User::where('id', Session::get('userId'))->first();

            $subject = new SendEmailService(new EmailSubject("New Certificate Password for Work Reference no: " . $certificate->id));
            $mailTo = new EmailAddress($user->email);
            $message = new ResetPassword();
            $emailBody = $message->message($certificate, $request->password);
            $body = new EmailBody($emailBody);
            $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
            $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
            $result = $sendEmail->send($emailMessage);

            session()->flash('msg', 'Certificate Password Updated Successfully!');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

    }

    public function downloadCertificateFile($certificateId, $fileId)
    {
        $file = CertificateFiles::where('id', $fileId)->first();
        $certificate = Certificates::where('id', $certificateId)->first();
        $user = User::where('id', $certificate->user_id)->first();
        $file = base_path('/data') . '/Certificate-Files-' . $user->id . '/' . $file->file_name;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function showTourImage($tourId)
    {
        $file = Tours::where('id', $tourId)->first();
        $file = base_path('/data') . '/user-files' . '/' . $file->picture;
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        return readfile($file);
    }

    public function showImage($fileId)
    {
        $file = base_path('/data') . '/downloads' . '/' . $fileId . '.png';
        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        header('Content-Disposition: attachment; filename="Warning-Logo.png"');
        return readfile($file);
    }

    public function downloadLogo($userId, $fileId)
    {

        if ($fileId == 0) {
            $file = base_path('/data') . '/downloads' . '/zipFile.zip';
        } else {
            $file = base_path('/data') . '/downloads' . '/' . $fileId . '.png';
        }

        $type = mime_content_type($file);
        header('Content-Type:' . $type);
        header('Content-Length: ' . filesize($file));
        if ($fileId == 0) {
            header('Content-Disposition: attachment; filename="Warning-Logo-Zip.zip"');
        } else {
            header('Content-Disposition: attachment; filename="Warning-Logo-' . $fileId . '.png" ');
        }
        return readfile($file);
    }

    public function testingMail()
    {
        $message = new WorkProtected();
        $userId = Session::get('userId');
        $currentUser = User::where('id', $userId)->first();
        $certificates = Certificates::where('user_id', $userId)->first();
        $emailBody = $message->message($currentUser, $certificates, 'sdsdvsdv');
        return $emailBody;
    }

    public function savingNewWork(Request $request)
    {
        try {
            $userId = Session::get('userId');
            $currentUser = User::where('id', $userId)->first();
            $userToken = UserTokens::where('user_id', $userId)->first();
            if ((int)$userToken->token <= 0) {
                return redirect()->back()->withErrors(['You do not have tokens to create this certificate. Please buy more token from ADD MORE TOKENS section and try again!']);
            }

            if (!$request->hasfile('fileOne')) {
                return redirect()->back()->withErrors(['Atleast one File should be uploaded!']);
            }
            $certificates = new Certificates();
            $certificates->user_id = $userId;
            $certificates->title = $request->title;
            $certificates->ip = $this->getIPAddress();
            $randomPassword = $this->generateRandomString(10);
            $certificates->password = $randomPassword;
            $certificates->save();

            if ($request->hasfile('fileOne')) {
                $files = $request->file('fileOne');
                foreach ($files as $file) {
                    $name = $request->fileOneName . rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/Certificate-Files-' . $userId . '/', $name);
                    $certificateFiles = new CertificateFiles();
                    $certificateFiles->certificate_id = $certificates->id;
                    $certificateFiles->file_name = $name;
                    $certificateFiles->user_given_name = $request->fileOneName;
                    $certificateFiles->save();
                }
            } else {
                return redirect()->back()->withErrors(['Atleast one File should be uploaded!']);
            }
            if ($request->hasfile('fileTwo')) {
                $files = $request->file('fileTwo');
                foreach ($files as $file) {
                    $name = $request->fileTwoName . rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/Certificate-Files-' . $userId . '/', $name);
                    $certificateFiles = new CertificateFiles();
                    $certificateFiles->certificate_id = $certificates->id;
                    $certificateFiles->file_name = $name;
                    $certificateFiles->user_given_name = $request->fileTwoName;
                    $certificateFiles->save();
                }
            }
            if ($request->hasfile('fileThree')) {
                $files = $request->file('fileThree');
                foreach ($files as $file) {
                    $name = $request->fileThreeName . rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/Certificate-Files-' . $userId . '/', $name);
                    $certificateFiles = new CertificateFiles();
                    $certificateFiles->certificate_id = $certificates->id;
                    $certificateFiles->file_name = $name;
                    $certificateFiles->user_given_name = $request->fileThreeName;
                    $certificateFiles->save();
                }
            }
            if ($request->hasfile('fileFour')) {
                $files = $request->file('fileFour');
                foreach ($files as $file) {
                    $name = $request->fileFourName . rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/Certificate-Files-' . $userId . '/', $name);
                    $certificateFiles = new CertificateFiles();
                    $certificateFiles->certificate_id = $certificates->id;
                    $certificateFiles->file_name = $name;
                    $certificateFiles->user_given_name = $request->fileFourName;
                    $certificateFiles->save();
                }
            }
            if ($request->hasfile('fileFive')) {
                $files = $request->file('fileFive');
                foreach ($files as $file) {
                    $name = $request->fileFiveName . rand(0, 1000) . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(base_path('/data') . '/Certificate-Files-' . $userId . '/', $name);
                    $certificateFiles = new CertificateFiles();
                    $certificateFiles->certificate_id = $certificates->id;
                    $certificateFiles->file_name = $name;
                    $certificateFiles->user_given_name = $request->fileFiveName;
                    $certificateFiles->save();
                }
            }
            $userToken = UserTokens::where('user_id', $userId)->first();
            $userToken->token = (int)$userToken->token - 1;
            $userToken->update();

            $subject = new SendEmailService(new EmailSubject("Your work has been protected by " . env('APP_NAME')));
            $mailTo = new EmailAddress($currentUser->email);
            $message = new WorkProtected();
            $emailBody = $message->message($currentUser, $certificates, $randomPassword);
            $body = new EmailBody($emailBody);
            $emailMessage = new EmailMessage($subject->getEmailSubject(), $mailTo, $body);
            $sendEmail = new EmailSender(new PhpMail(new MailConf("smtp.gmail.com", "admin@dispatch.com", "secret-2021")));
            $result = $sendEmail->send($emailMessage);

            session()->flash('msg', 'Certificate Created Successfully!');
            return redirect('my-protected-work');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);

        }

    }

    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
}
