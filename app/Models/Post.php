<?php

declare(strict_types=1);

namespace App\Models;
use App\Enums\PostStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class  Post extends Model
{
    use HasFactory;
	public $timestamps = true;

    protected $casts = [
        'status' => PostStatusEnum::class,
    ];

    protected $fillable = [
        'user_id',
		'title',
		'text',
		'post_category_id',
		'status',
		'image',
    ];

    public function post_category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }
}
