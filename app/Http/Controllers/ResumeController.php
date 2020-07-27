<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();
            if (isset($user->details) && $user->details->count() > 0) {
                return view('resume', compact('user'));
            }
        } catch (\Exception $th) {
            return 'enter data';
        }
    }

    public function download()
    {
        $user = auth()->user();

        $pdf = \PDF::loadView('resume', compact('user'));
        return $pdf->download('MyResume.pdf');
    }
}
