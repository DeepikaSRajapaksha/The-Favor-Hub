<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Store session manually (no guard for now)
            session(['admin_id' => $admin->id, 'admin_name' => $admin->name]);
            return redirect()->route('admin.dashboard.index')->with('success', 'Welcome back, ' . $admin->name . '!');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // // Logout
    // public function logout()
    // {
    //     session()->forget(['admin_id', 'admin_name']);
    //     return redirect('/admin/login')->with('success', 'Logged out successfully.');
    // }
}

