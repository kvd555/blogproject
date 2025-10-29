<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\PostCategory;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<PostCategory>
 */
class PostCategoryResource extends ModelResource
{
    protected string $model = PostCategory::class;

    public function getTitle(): string
    {
        return 'PostCategory';
    }

    public function indexFields(): iterable
    {
        // TODO correct labels values
        return [
			ID::make('post_category_id'),
			Text::make('name', 'name'),
        ];
    }

    public function formFields(): iterable
    {
        return [
            Box::make([
                ...$this->indexFields()
            ])
        ];
    }

    public function detailFields(): iterable
    {
        return [
            ...$this->indexFields()
        ];
    }

    public function filters(): iterable
    {
        return [
        ];
    }

    public function rules(mixed $item): array
    {
        // TODO change it to your own rules
        return [
			'name' => ['string', 'required'],
        ];
    }
}
