<?php

namespace App\Policies;

use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Post $post): bool
    {
        return $post->user()->is($user);
    }

    public function delete(User $user, Post $post): bool
    {
        return $post->user()->is($user);
    }


}
