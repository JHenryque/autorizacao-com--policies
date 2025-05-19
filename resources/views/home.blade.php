@extends('layouts.main_layout')
@section('content')

    @can('create', \App\Models\Post::class
)
        <div class="container my-3">
            <div class="row">
                <div class="col">
                    <a href="{{ route('create') }}" class="btn btn-primary">Create post</a>
                </div>
            </div>
        </div>
    @endcan
    @if($posts->count() == 0)
        <div class="my-5 opacity-50">
            No Posts found
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col">
                    @foreach($posts as $post)
                        @can('view', $post)
                         <x-post-component :post="$post" />
                        @endcan
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection
