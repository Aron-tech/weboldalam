<?php

namespace App\Enums;

enum ProjectTypesEnum : string
{
    case COMPLETED = 'completed';
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case ARCHIVED = 'archived';

    public function getLabel(): string
    {
        return match ($this) {
            ProjectTypesEnum::COMPLETED => 'Befejezett',
            ProjectTypesEnum::ACTIVE => 'Folyamatban',
            ProjectTypesEnum::INACTIVE => 'Inaktív',
            ProjectTypesEnum::ARCHIVED => 'Archiválva',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(
            fn ($case) => [$case->value => $case->getLabel()]
        )->toArray();
    }

    public function getColor(): string
    {
        return match ($this) {
            ProjectTypesEnum::COMPLETED => 'green-500',
            ProjectTypesEnum::ACTIVE => 'blue-600',
            ProjectTypesEnum::INACTIVE => 'red-500',
            ProjectTypesEnum::ARCHIVED => 'gray-500',
        };
    }
}
