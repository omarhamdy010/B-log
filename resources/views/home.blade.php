@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body text-end fs-5 ">
                <a href="{{route('posts.create')}}" class="btn btn-sm btn-primary ">
                    @lang('Add Blog')</a>
            </div>
            <div class="live-preview">
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('title')</th>
                                    <th>@lang('body')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('publish date')</th>
                                    <th>@lang('action')</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($blogs as $index => $blog)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->body}}</td>
                                    <td>{{$blog->status}}</td>
                                    <td>{{$blog->publication_date }}
                                    </td>
                                    <td>
                                        <form action="{{route('posts.destroy', ['post' => $blog->id])}}" method="post">
                                            @method('delete')
                                            @csrf
                                            @can('update', $blog)
                                                <a href="{{route('posts.edit', ['post' => $blog->id])}}"
                                                    class="btn btn-warning"> <i class="las la-edit"></i> edit</a>
                                            @endcan

                                            @can('delete', $blog)
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="las la-trash"></i> delete
                                                </button>
                                            @endcan

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
        </div><!-- card end -->
    </div>
</div>
</div>
@endsection