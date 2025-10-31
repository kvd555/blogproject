<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Email;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Пользователи';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Имя', 'name'),
            Email::make('Почта', 'email'),
            Date::make('Создан', 'created_at')->format('d.m.Y H:i')->sortable(),
            Date::make('Обновлен', 'updated_at')->format('d.m.Y H:i')->sortable(),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Grid::make([
                Column::make([
                    Box::make('Внесите нового пользователя', [
                        ID::make(),
                        Text::make('Имя', 'name'),
                        Email::make('Почта', 'email'),
                        Password::make('Пароль', 'password'),
                    ])
                ]),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ...$this->indexFields()

        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name' => ['sometimes', 'required','string'],
            'email' => ['required','string','email'],
            'password' => ['sometimes', 'required','string'],
        ];
    }


}
