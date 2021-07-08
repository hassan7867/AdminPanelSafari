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
            if ($dbUser->password == ($request->password)) {
                Session::put('adminId', $dbUser->id);
                return redirect('dashboard');
            }else {
                return redirect()->back()->withErrors(['Invalid Email or Password']);
            }
        } else {
            return redirect()->back()->withErrors(['Invalid Email or Password']);
        }
    }
    public function signout()
    {
        Session::remove('adminId');
        return json_encode(true);
    }

    public function approveReview($id)
    {
        try{
            $reviewId= ReviewsTable::where('id',$id)->first();
            $reviewId->status="approved";
            $reviewId->update();
            session()->flash('msg', 'Approved');
            return redirect()->back();
        }
        catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

    }

    public function rejectReview($id)
    {
        try {
            $reviewId = ReviewsTable::where('id', $id)->first();
            $reviewId->status = "rejected";
            $reviewId->update();
            session()->flash('msg', 'Rejected');
            return redirect()->back();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

    }


}
