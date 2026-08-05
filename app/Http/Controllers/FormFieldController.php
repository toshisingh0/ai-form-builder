<?php

namespace App\Http\Controllers;
use App\Models\FormField;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{
    public function update(Request $request, FormField $field)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'placeholder' => 'nullable|string|max:255',
            'required' => 'boolean',
        ]);

        $field->update([
            'label' => $request->label,
            'placeholder' => $request->placeholder,
            'required' => $request->required,
        ]);

        return response()->json([
            'message' => 'Field Updated Successfully',
            'field' => $field
        ]);
    }
}
