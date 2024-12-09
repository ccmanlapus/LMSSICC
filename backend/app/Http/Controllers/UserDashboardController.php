<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    /**
     * Redirect users to their respective dashboards based on role.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToDashboard()
    {
        $user = Auth::user(); // Get the currently authenticated user

        // Check the user's role and redirect to the corresponding dashboard
        if ($user->roles->contains('name', 'program head')) {
            return redirect()->route('program-head.dashboard');
        }

        if ($user->roles->contains('name', 'instructor')) {
            return redirect()->route('instructor.dashboard');
        }

        if ($user->roles->contains('name', 'student')) {
            return redirect()->route('student.dashboard');
        }

        // Fallback if no role matches
        return redirect()->route('login')->with('error', 'Role not recognized.');
    }
}
