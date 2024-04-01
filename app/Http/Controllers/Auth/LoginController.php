<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        //
        $rules = array(
            'email' => 'required|string',
            'password' => 'required|string',
        );
        $validator = Validator::make($request->all(), $rules);


        // process the login
        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        } else {
            // validate
            $url = 'https://hutechclassroom.azurewebsites.net/api/';
            $response = Http::post($url . 'v1/Account/login', [
                'userName' => $request->email,
                'password' => $request->password
            ]);
            $data = json_decode($response->body(), true);
            if ($response->status() >= 400) {
                return redirect('login')
                    ->withErrors(['email' => $data['title']])
                    ->withInput();
            }
            $id = $data['id'];
            $userName = $data['userName'];
            $email = $data['email'];
            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $class = $data['class'];
            $token = $data['token'];
            
            $jwtCookie = $response->cookies()->getCookieByName('accessToken')->getValue();
            
            // dd(JWTAuth::user());

            // Store JWT token in client's browser
            return redirect('home')->withCookie(cookie('accessToken', $jwtCookie, 0));

            // return redirect('home');
        }
    }
}
