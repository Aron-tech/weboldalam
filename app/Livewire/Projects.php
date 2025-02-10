<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $projects = Project::where('title', 'like', '%' . $this->search . '%')->paginate(12);
        return view('livewire.projects', ['projects' => $projects]);
    }
}
