<?php

namespace App\Http\Controllers;

use App\AdminTable;
use App\ReviewsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if (AdminTable::where('email', $request->email)->exists()) {
            $dbUser = AdminTable::where('email', $request->email)->first();
            if ($dbUser->password == md5($request->password)) {
                Session::put('adminId', $dbUser->id);
                return json_encode(['status' => true, 'message' => 'Login Successfull!']);
            }
        } else {
            return json_encode(['status' => false, 'message' => 'Invalid username or password!']);
        }
    }
    public function signout()
    {
        Session::remove('adminId');
        return json_encode(true);
    }

    public function approveReview(Request $request)
    {
        try{
            $reviewId= ReviewsTable::where('id',$request->id)->first();
            $reviewId->status="approved";
            $reviewId->update();
            return json_encode(true);
        }
        catch (\Exception $exception){
            return json_encode(['status'=>false,'message'=>$exception->getMessage()]);
        }

    }

    public function rejectReview(Request $request)
    {
        try {
            $reviewId = ReviewsTable::where('id', $request->id)->first();
            $reviewId->status = "rejected";
            $reviewId->update();
            return json_encode(true);
        } catch (\Exception $exception) {
            return json_encode(['status' => false, 'message' => $exception->getMessage()]);
        }

    }


}
