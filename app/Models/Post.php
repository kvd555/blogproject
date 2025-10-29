<?php

declare(strict_types=1);

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class  Post extends Model
{
	public $timestamps = true;

    protected $fillable = [
        'user_id',
		'title',
		'text',
		'post_category_id',
		'status',
		'image',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }
}
