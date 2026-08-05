<?php

namespace App\Livewire;
use App\Models\Form;
use App\Models\FormField;
use Livewire\Component;

class FormBuilder extends Component
{
     public $form;

    public $fields = [];

    public $editingField = null;

    public $label;

    public $placeholder;

    public $required = false;


    public function mount(Form $form)
    {
        $this->form = $form;

        $this->fields = $form->fields()
            ->orderBy('position')
            ->get()
            ->toArray();
    }

    //  public function mount()
    // {
    //     $this->fields = [
    //         ['id' => 1, 'label' => 'Name'],
    //         ['id' => 2, 'label' => 'Email'],
    //         ['id' => 3, 'label' => 'Phone'],
    //     ];
    // }

    public function addField($type)
    {
        $field = FormField::create([
            'form_id' => $this->form->id,
            'type' => $type,
            'label' => ucfirst($type),
            'key' => strtolower($type),
            'placeholder' => 'Enter ' . ucfirst($type),
            'required' => false,
            'position' => count($this->fields) + 1,
        ]);

        $this->fields[] = $field->toArray();
        $this->updateSchema();
    }

    public function edit($id)
    {
        $field = FormField::findOrFail($id);

        $this->editingField = $field->id;

        $this->label = $field->label;

        $this->placeholder = $field->placeholder;

        $this->required = $field->required;
    }


    public function updateField()
    {
        $field = FormField::findOrFail($this->editingField);

        $field->update([
            'label' => $this->label,
            'placeholder' => $this->placeholder,
            'required' => $this->required,
        ]);

        $this->fields = $this->form->fields()->get()->toArray();

        $this->editingField = null;
        $this->updateSchema();
    }

    public function deleteField($id)
    {
        FormField::findOrFail($id)->delete();

        $this->fields = $this->form->fields()
            ->orderBy('position')
            ->get()
            ->toArray();
            $this->updateSchema();
    }
    public function updateOrder($ids)
    {
    foreach ($ids as $index => $id) {

        FormField::where('id', $id)
            ->update([
                'position' => $index + 1
            ]);
    }
    $this->updateSchema();
    }

    public function duplicateField($id)
    {
        $field = FormField::findOrFail($id);

        FormField::create([
            'form_id'     => $field->form_id,
            'type'        => $field->type,
            'label'       => $field->label . ' Copy',
            'key'         => $field->key . '_copy_' . time(),
            'placeholder' => $field->placeholder,
            'required'    => $field->required,
            'options'     => $field->options,
            'validation'  => $field->validation,
            'position'    => FormField::where('form_id', $field->form_id)->max('position') + 1,
        ]);

         // dd("Duplicate Created");
    }

    private function updateSchema()
    {
        $fields = FormField::where('form_id', $this->form->id)
            ->orderBy('position')
            ->get()
            ->map(function ($field) {
                return [
                    'type' => $field->type,
                    'label' => $field->label,
                    'key' => $field->key,
                    'placeholder' => $field->placeholder,
                    'required' => $field->required,
                ];
            })
            ->toArray();

        $this->form->update([
            'schema' => [
                'fields' => $fields,
            ],
        ]);
    }

    public function render()
    {
        return view('livewire.form-builder');
    }
}
