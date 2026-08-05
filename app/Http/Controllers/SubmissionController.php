<?php

namespace App\Http\Controllers;
use App\Models\FormSubmission;
use Illuminate\Http\Request;
use App\Exports\SubmissionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Form;

class SubmissionController extends Controller
{
   public function index(Form $form)
    {
        $submissions = FormSubmission::where('form_id', $form->id)
            ->with('values')
            ->paginate(10);

        return view('submissions.index', compact('form', 'submissions'));
    }

   public function export(Form $form)
    {
        $schema = $form->schema;

        // Header
        $rows = [];
        $headings = [];

        foreach ($schema['fields'] as $field) {
            $headings[] = $field['label'];
        }

        $rows[] = $headings;

        // Load submissions with values
        $form->load('submissions.values');

        foreach ($form->submissions as $submission) {

            $row = [];

            foreach ($schema['fields'] as $field) {

                $value = $submission->values
                    ->firstWhere('field_key', $field['key']);

                $row[] = $value ? $value->value : '';
            }

            $rows[] = $row;
        }

        return Excel::download(
            new SubmissionExport($rows),
            'submissions.csv'
        );
    }
}
