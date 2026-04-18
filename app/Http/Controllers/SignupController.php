<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Hash;
use Laravel\Socialite\Facades\Socialite;
use Log;
use Auth;
use Str;
use App\Jobs\SendWelcomeEmail;
class SignupController extends Controller
{
    public function index(){
        return view('index');
    }
    
public function signup(UserRequest $request)
{
    // Create the user
    $created = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'verification_token' => Str::random(12), // Generate a verification token
        'role' => 'user'
    ]);

    if ($created) {
        // Dispatch the welcome email job
        SendWelcomeEmail::dispatch($created);
        
        // Redirect with success message
        return redirect('/')->with('msg', 'Registered Successfully. Please Check Your Email!');
    }

    // Optional: Handle user creation failure
    return redirect()->back()->withErrors(['msg' => 'Registration failed. Please try again.']);
}
    public function userdashboard(){
        return "Hello User";
    }
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    // public function googleHandle()
    // {
    //     try {
    //         //echo"Hello";
    //         $googleUser = Socialite::driver('google')->user(); // Use stateless() if needed
            
    //         // Check if the user already exists in your database
    //         $user = User::where('google_id', $googleUser->getId())->first();
            
    //         if (!$user) {
    //             // Create a new user if they don't exist
    //             $user = User::create([
    //                 'name' => $googleUser->getName(),
    //                 'email' => $googleUser->getEmail(),
    //                 'password' => Hash::make(Str::random(24)),
    //                 'google_id' => $googleUser->getId(),
    //                 'verification_token' => Str::random(60),
    //             ]);
                
    //             // Log the user in
    //             Auth::login($user);
    //         } else {
    //             // Log the user in
    //             Auth::login($user);
    //         }

    //         return redirect()->route('user-dashboard');
    //     } catch (Exception $e) {
    //         // Log or handle the error accordingly
    //         return redirect('/login')->with('error', 'Error authenticating with Google: ' . $e->getMessage());
    //     }
    // }
    public function verify($token){
        $user=User::Where('verification_token',$token)->first();
        if (!$user) {
            return redirect('/')->with('error', 'Invalid verification link.');
        }
        $user->email_verified_at = now();
        $user->verification_token = null; // Clear the token after verification
        $user->is_verified = 1; // Clear the token after verification
        $user->save();

        return redirect('/')->with('msg', 'Your email has been verified successfully.');
    }
}
