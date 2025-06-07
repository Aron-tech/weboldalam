<?php

namespace App\Livewire;

use App\Enums\ProjectTypesEnum;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\Project;
use App\Models\Tag;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public ?string $search = null;
    public bool $show_filter = false;
    public array $selected_statuses = [];
    public array $selected_tags = [];
    public array $sort_options = [
        'latest' => 'Legújabb',
        'oldest' => 'Legrégebbi',
        'title_asc' => 'Cím (A-Z)',
        'title_desc' => 'Cím (Z-A)',
    ];
    public string $sort_by = 'latest';
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingSelectedStatuses(): void
    {
        $this->resetPage();
    }

    public function updatingSelectedTags(): void
    {
        $this->resetPage();
    }

    public function updatingSortBy(): void
    {
        $this->resetPage();
    }

    public function toggleFilter(): void
    {
        $this->show_filter = !$this->show_filter;
    }

    public function clearFilters(): void
    {
        $this->search = null;
        $this->selected_statuses = [];
        $this->selected_tags = [];
        $this->sort_by = 'latest';
        $this->resetPage();
    }

    public function toggleStatus(string $status): void
    {
        if (in_array($status, $this->selected_statuses)) {
            $this->selected_statuses = array_diff($this->selected_statuses, [$status]);
        } else {
            $this->selected_statuses[] = $status;
        }
        $this->resetPage();
    }

    public function toggleTag($tag_id): void
    {
        if (in_array($tag_id, $this->selected_tags)) {
            $this->selected_tags = array_diff($this->selected_tags, [$tag_id]);
        } else {
            $this->selected_tags[] = $tag_id;
        }
        $this->resetPage();
    }

    public function render(): View
    {
        $projects = Project::where('visible', true)
            ->when($this->search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->when(count($this->selected_statuses) > 0, function ($query) {
                $query->whereIn('status', $this->selected_statuses);
            })
            ->with('tags')
            ->when(count($this->selected_tags) > 0, function ($query) {
                $query->whereHas('tags', function ($q) {
                    $q->whereIn('tags.id', $this->selected_tags);
                });
            })
            ->when($this->sort_by === 'latest', function ($query) {
                $query->latest();
            })
            ->when($this->sort_by === 'oldest', function ($query) {
                $query->oldest();
            })
            ->when($this->sort_by === 'title_asc', function ($query) {
                $query->orderBy('title', 'asc');
            })
            ->when($this->sort_by === 'title_desc', function ($query) {
                $query->orderBy('title', 'desc');
            })
            ->paginate(12);

        $all_tags = Tag::orderBy('name')->get();
        $all_statuses = ProjectTypesEnum::cases();

        return view('livewire.project.index', [
            'projects' => $projects,
            'all_tags' => $all_tags,
            'all_statuses' => $all_statuses,
        ]);
    }
}
