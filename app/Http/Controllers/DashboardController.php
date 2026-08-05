<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\FormField;
use App\Models\FormSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        $forms = Form::latest()->get();

        return view('dashboard', [
            'forms' => $forms,
            'formCount' => Form::count(),
            'fieldCount' => FormField::count(),
            'submissionCount' => FormSubmission::count(),
        ]);
    }
}