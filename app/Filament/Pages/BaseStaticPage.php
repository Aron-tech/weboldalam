<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use App\Models\StaticContent;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Pest\Mutate\Mutators\ControlStructures\ForeachEmptyIterable;

abstract class BaseStaticPage extends Page implements HasForms
 {

    use InteractsWithForms;

    public array $content = [];



    abstract protected function getPageKey(): string;

    private function isFilePath($value): bool {
        return is_string($value) && !empty($value) && str_contains($value, $this->getPageKey() .'/');
    }


    public function mount() {
        $this->form->fill(
            StaticContent::where('page', $this->getPageKey())->pluck('value', 'key')->toArray()
        );
    }

   public function form(Form $form): Form{
        return $form->schema($this->defineForm())
        ->statePath('content');
   }

    abstract protected function defineForm(): array;

    public function save() {

        $this->validate();

        foreach ($this->form->getState() as $key => $value) {

            StaticContent::updateOrCreate(
                ['page' => $this->getPageKey(), 'key' => $key],
                ['value' => $value]
            );
        }

        Notification::make()
            ->title('Sikeres mentés')
            ->success()
            ->body('A tartalom frissítve lett.')
            ->send();
    }
}

