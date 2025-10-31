<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\PostStatusEnum;
use App\Models\Post;

use MoonShine\CKEditor\Fields\CKEditor;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Fields\Enum;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Post>
 */
class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Посты';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            Number::make('user_id', 'user_id'),
            Text::make('title', 'title'),
            CKEditor::make('text', 'text'),
            Number::make('post_category_id', 'post_category_id'),
            Enum::make('Статус', 'status')
                ->attach(PostStatusEnum::class)
                ->default(PostStatusEnum::BrandNew),
            Image::make('image', 'image')
                ->dir('/')
                ->disk('public')
                ->allowedExtensions(['jpg', 'jpeg', 'png', 'gif'])
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
                    Box::make('Внесите новый пост', [
                        ...$this->indexFields()
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
            ID::make()->sortable(),
            ...$this->indexFields(),
        ];
    }

    /**
     * @param Post $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'user_id' => ['int', 'required'],
            'title' => ['string', 'required'],
            'text' => ['string', 'required'],
            'post_category_id' => ['int', 'nullable'],
            'status' => ['int', 'required'],
            'image' => ['nullable'],
        ];
    }
}
