<?php

namespace App\Http\Controllers;
use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\FormSubmission;
use App\Models\SubmissionValue;

class PublicFormController extends Controller
{
    public function show(Form $form)
    {
        return view('public-form', compact('form'));
    }

    public function submit(Request $request, Form $form)
    {
        // _token hata do
        $data = $request->except('_token');

        // Ek submission create karo
        $submission = FormSubmission::create([
            'form_id' => $form->id,
        ]);

        // Har field ki value save karo
        foreach ($data as $key => $value) {

            SubmissionValue::create([
                'submission_id' => $submission->id,
                'field_key' => $key,
                'value' => $value,
            ]);

        }

        return back()->with('success', 'Form Submitted Successfully.');
    }
}
