<?php

declare(strict_types=1);

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostCategory extends Model
{
	public $timestamps = false;

    protected $table = 'post_categories';
    protected $fillable = [
		'name',
    ];

    public function postCategories(): HasMany {
        return $this->hasMany(Post::class, 'post_category_id', 'id');
    }
}
