<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\PemilikProperti;
use App\Models\Penyewa;
use App\Support\AuthSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showSignIn()
    {
        if (AuthSession::check()) {
            return redirect('/');
        }

        return view('auth.signin');
    }

    public function showSignUp()
    {
        if (AuthSession::check()) {
            return redirect('/');
        }

        return view('auth.signup');
    }

    public function signIn(Request $request)
    {
        $validated = $request->validate([
            'role' => ['required', Rule::in(['admin', 'pemilik', 'penyewa'])],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = match ($validated['role']) {
            'admin' => Admin::where('email', $validated['email'])->first(),
            'pemilik' => PemilikProperti::where('email', $validated['email'])->first(),
            'penyewa' => Penyewa::where('email', $validated['email'])->first(),
        };

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return back()
                ->withInput($request->only('email', 'role'))
                ->withErrors(['email' => 'Email atau password salah.']);
        }

        AuthSession::login($user, $validated['role']);

        return redirect()->intended('/');
    }

    public function signUp(Request $request)
    {
        $validated = $request->validate([
            'role' => ['required', Rule::in(['pemilik', 'penyewa'])],
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:150'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $username = $this->generateUsername($validated['name'], $validated['email']);

        if ($validated['role'] === 'pemilik') {
            if (PemilikProperti::where('email', $validated['email'])->exists()) {
                return back()->withInput()->withErrors(['email' => 'Email sudah terdaftar.']);
            }

            PemilikProperti::create([
                'username' => $username,
                'nama_lengkap' => $validated['name'],
                'email' => $validated['email'],
                'no_telepon' => $validated['phone'],
                'password' => Hash::make($validated['password']),
                'status' => 'aktif',
            ]);
        } else {
            if (Penyewa::where('email', $validated['email'])->exists()) {
                return back()->withInput()->withErrors(['email' => 'Email sudah terdaftar.']);
            }

            Penyewa::create([
                'username' => $username,
                'nama_lengkap' => $validated['name'],
                'email' => $validated['email'],
                'no_telepon' => $validated['phone'],
                'password' => Hash::make($validated['password']),
                'status' => 'aktif',
            ]);
        }

        return redirect('/signin')
            ->with('success', 'Akun berhasil dibuat. Silakan masuk.')
            ->withInput(['email' => $validated['email'], 'role' => $validated['role']]);
    }

    public function logout()
    {
        AuthSession::logout();

        return redirect('/');
    }

    private function generateUsername(string $name, string $email): string
    {
        $base = Str::slug(Str::before($email, '@'), '_');
        if ($base === '') {
            $base = Str::slug($name, '_');
        }

        $username = $base;
        $counter = 1;

        while (
            PemilikProperti::where('username', $username)->exists()
            || Penyewa::where('username', $username)->exists()
            || Admin::where('username', $username)->exists()
        ) {
            $username = $base.'_'.$counter;
            $counter++;
        }

        return $username;
    }
}
