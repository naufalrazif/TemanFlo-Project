<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\DB;
use App\Rules\Captcha; 

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register', [
            'captchaKey' => env('CAPTCHA_KEY') 
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'no_telp' => 'required|string|max:15',
            'g-recaptcha-response' => ['required', new Captcha()], 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'role' => 'customer',
        ]);

        event(new Registered($user));

        // Generate & Simpan OTP
        $otp = rand(100000, 999999);

        DB::table('otps')->updateOrInsert(
            ['user_id' => $user->id],
            [
                'otp_code' => $otp,
                'expired_at' => now()->addMinutes(5),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Kirim Email OTP
        Mail::to($user->email)->send(new SendOtpMail($otp, $user));

        return redirect()->route('otp.verification')
            ->with('success', 'Kode OTP telah dikirim ke email Anda.')
            ->with('email', $user->email)
            ->with('user_id', $user->id);
    }
}