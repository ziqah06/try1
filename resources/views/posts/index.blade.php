@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    
    @if(count($posts) > 0)
        @foreach ($posts as $post)
        <div class="jumbotron">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3> <!--tuk panggil id by click title-->
            <small>Written on {{$post->created_at}}</small>
        </div>
        @endforeach
        {{$posts->links()}} <!--utk pagination-->
    @else
        <p>No posts found</p>
    @endif
@endsection