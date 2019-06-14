<?php

namespace App\Http\Controllers\Site\Auth;

use App\Member;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;

class AuthController extends Controller {

    public function __construct(Request $request) {
        $this->middleware('guest.site', ['except' => ['logout', 'getLogout']]);
        //parent::__construct($request);
    }

    public function getIndex() {
        return view('site.auth.login');
    }

    public function postLogin(Request $r) {
        // 1- Validator::make()
        // 2- check if fails
        // 3- fails redirect or success not redirect

        $return = [
            'status' => 'success',
            'message' => 'Login Success!',
            'url' => route('site.home')
        ];

        // grapping admin credentials
        $name = $r->input('email');
        $password = $r->input('password');
        // Searching for the admin matches the passed email or adminname
        $admin = Member::where('national_id', $name)->orWhere('email', $name)->first();
//($admin && Hash::check($password, $admin->password))
        if ($admin && Hash::check($password, $admin->password)) {
            // login the admin
            Auth::guard('members')->login($admin, $r->has('remember'));
        } else {
            $return = [
                'response' => 'error',
                'message' => 'Login Failed!'
            ];
        }
        return response()->json($return);
    }

    /**
     * Logout The user
     */
    public function logout() {
        Auth::guard('members')->logout();
        return redirect()->route('site.login');
    }

}
