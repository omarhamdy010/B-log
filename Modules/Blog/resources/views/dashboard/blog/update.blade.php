@extends('Blog::layouts.app')

@section('content')
<div class="container">
    <div class="col-xl-12">
        <div class="card">
            <div class="live-preview">
                <div class="table-responsive">
                    <form action="{{route('posts.update', ['post' => $blog->id])}}" method="post">
                        @method('put')
                        @csrf

                        <div class="form-group w-50 p-2">
                            <label for="title"> title</label>
                            <input type="text" name="title" value="{{$blog->title}}" class="form-control">
                        </div>

                        <div class="form-group w-50 p-2">
                            <label for="body"> body</label>
                            <textarea name="body" class="form-control">{{$blog->body}}</textarea>
                        </div>

                        <div class="form-group w-50 p-2">
                            <label for="status"> status </label>
                            <input type="checkbox" name="status" {{$blog->status == 'true' ? "checked" : ''}}>
                        </div>

                        <div class="form-group p-2 text-end">
                            <button type="submit" class="fs-5 text-white  bg-primary"> submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div><!-- card end -->
    </div>
</div>
@endsection