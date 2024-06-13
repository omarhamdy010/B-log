<?php

namespace Modules\Blog\Repositories;

use Illuminate\Support\Carbon;
use Modules\Blog\App\Models\Blog;


class BlogRepository
{
    public function getAllBlogs()
    {
        return Blog::all();
    }

    public function getBlogById($blogId)
    {
        return Blog::findOrFail($blogId);
    }

    public function create($request)
    {
        if (isset($request['status']) && $request['status'] == true) {
            $status = true;
            $publication_date = Carbon::now();
        } else {
            $status = false;
        }

        $user_id = auth()->id();

        return Blog::create([
            'title' => $request['title'],
            'body' => $request['body'],
            'status' => $status,
            'publication_date' => $publication_date ?? null,
            'user_id' => $user_id,
        ]);
    }

    public function update($blog, $request)
    {

        if (isset($request['status']) && $request['status'] == true) {
            $status = true;
            $publication_date = Carbon::now();
        } else {
            $status = false;
            $publication_date = null;
        }

        $blog->update([
            'title' => $request['title'],
            'body' => $request['body'],
            'status' => $status,
            'publication_date' => $publication_date ?? null,
            'user_id' => $blog->user_id,
        ]);

        return $blog;
    }

    public function deleteBlog($blog)
    {
        $blog->delete();
    }
}
