<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Post;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;

/**
 * @extends ModelResource<Post>
 */
class PostResource extends ModelResource
{
    protected string $model = Post::class;

    public function getTitle(): string
    {
        return 'Post';
    }

    public function indexFields(): iterable
    {
        // TODO correct labels values
        return [
			ID::make('user_id'),
			Text::make('title', 'title'),
			Text::make('text', 'text'),
			Number::make('post_category_id', 'post_category_id'),
			Number::make('status', 'status'),
			Text::make('image', 'image'),
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
            'user_id' => ['int', 'required'],
			'title' => ['string', 'required'],
			'text' => ['string', 'required'],
			'post_category_id' => ['int', 'nullable'],
			'status' => ['int', 'required'],
			'image' => ['string', 'required'],
        ];
    }
}
