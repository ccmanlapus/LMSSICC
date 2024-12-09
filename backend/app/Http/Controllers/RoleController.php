<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
      /**
     * Constructor to apply middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle redirection based on user role.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Define views for each role
        $roleViews = [
            'admin' => 'admin.dashboard',
            'student' => 'student.dashboard',
            'instructor' => 'instructor.dashboard',
            'program_head' => 'program_head.dashboard',
        ];

        // Get the authenticated user's role
        $userRole = Auth::user()->role;

        // Check if a view exists for the role
        if (array_key_exists($userRole, $roleViews)) {
            return view($roleViews[$userRole]);
        }

        // Fallback for unrecognized roles
        return view('home');
    }
}
