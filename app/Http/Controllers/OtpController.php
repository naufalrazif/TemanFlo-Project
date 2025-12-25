<?php

namespace App\Http\Controllers;

use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Inertia\Inertia;

class OtpController extends Controller
{
    //menampilan form verifikasi OTP
    public function showVerificationForm(Request $request)
    {
        if (!Auth::check() && !$request->session()->has('user_id')) {
            return redirect()->route('register');
        }

        return Inertia::render('Auth/OtpVerification', [
            'email' => session('email'),
            'user_id' => session('user_id'),
        ]);
    }

    
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|numeric|digits:6',
            'user_id' => 'required|exists:users,id',
        ]);

        $otpRecord = DB::table('otps')
            ->where('user_id', $request->user_id)
            ->where('otp_code', $request->otp_code)
            ->first();
        //otp gaada di tabel/database nnti muncul eror
        if (!$otpRecord) {
            return back()->withErrors(['otp_code' => 'Kode OTP tidak valid.']);
        }
        //cek masa berlaku
        if (now()->gt($otpRecord->expired_at)) {
            return back()->withErrors(['otp_code' => 'Kode OTP telah kadaluarsa.']);
        }

        //hapus otp stlh verif
        DB::table('otps')->where('user_id', $request->user_id)->delete();

        // user habis regist, dah verif otp dan dia belum login
        if (!Auth::check()) {
            $user = User::find($request->user_id);

            // email sudah verified
            $user->update(['email_verified_at' => now()]);
            $request->session()->forget(['user_id', 'email']);

            return redirect()->route('login')
                ->with('success', 'Verifikasi OTP berhasil! Silakan login dengan akun Anda.');
        }

        // Jika sudah login
        auth()->user()->update(['email_verified_at' => now()]);

        return redirect()->route('dashboard')
            ->with('success', 'Verifikasi OTP berhasil!');
    }
}

