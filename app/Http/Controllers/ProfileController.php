<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\PemilikProperti;
use App\Models\Penyewa;
use App\Support\AuthSession;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        if (! AuthSession::check()) {
            return redirect('/signin');
        }

        return view('landing-page-component.profile', [
            'userRole' => AuthSession::role(),
        ]);
    }

    public function update(Request $request)
    {
        if (! AuthSession::check()) {
            return redirect('/signin');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        $user = AuthSession::resolveUser();

        if ($user instanceof Admin) {
            $user->update([
                'username' => $validated['name'],
                'email' => $validated['email'],
            ]);
        } elseif ($user instanceof PemilikProperti || $user instanceof Penyewa) {
            $user->update([
                'nama_lengkap' => $validated['name'],
                'email' => $validated['email'],
                'no_telepon' => $validated['phone'],
            ]);
        }

        session([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
