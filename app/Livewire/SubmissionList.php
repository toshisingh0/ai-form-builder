<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FormSubmission;

class SubmissionList extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $submissions = FormSubmission::whereHas('values', function ($query) {
            $query->where('value', 'like', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.submission-list', compact('submissions'));
    }
}