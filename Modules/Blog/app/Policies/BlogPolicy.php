<?php

namespace Modules\Blog\App\Policies;

use App\Models\User;
use Modules\Blog\App\Models\Blog;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the blog.
     *
     * @param  \App\Models\User  $user
     * @param  \Modules\Blog\App\Models\Blog  $blog
     * @return bool
     */
    public function update(User $user, $blog)
    {
        return $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \App\Models\User  $user
     * @param  \Modules\Blog\App\Models\Blog  $blog
     * @return bool
     */
    public function delete(User $user, Blog $blog)
    {
        return $user->id === $blog->user_id;
    }

}
