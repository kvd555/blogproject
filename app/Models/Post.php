<?php

declare(strict_types=1);

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class  Post extends Model
{
	public $timestamps = true;

    protected $fillable = [
		'title',
		'text',
		'post_category_id',
		'status',
		'image',
    ];
}
