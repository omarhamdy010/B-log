<?php

namespace Modules\Blog\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Modules\Blog\App\Models\Blog;
use App\Http\Controllers\Controller;
use Modules\Blog\Repositories\BlogRepository;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    public function create()
    {
        return view("Blog::dashboard.blog.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "required",
            "body" => "required",
        ]);

        $this->blogRepository->create($request->all());

        return redirect()->route("home")->with("success", "Blog created successfully");
    }

    public function edit($id)
    {
        $blog = $this->blogRepository->getBlogById($id);

        return view("Blog::dashboard.blog.update", compact("blog"));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => "required",
            "body" => "required",
        ]);

        $blog = Blog::findOrFail($id);

        $this->authorize('update', $blog);

        $blog = $this->blogRepository->update($blog, $request->all());


        return redirect()->route("home")->with("success", "Blog created successfully");
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $this->authorize('delete', $blog);

        $this->blogRepository->deleteBlog($blog);

        return redirect()->route("home")->with("success", "deleted successfully");
    }
}
