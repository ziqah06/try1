@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img width="100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br>
    <div>
        {!!$post->body!!} 
    </div>
    <hr>
    <!--small>Written on { {$post->created_at}}</small-->
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    @if (!Auth::guest()) <!--*tuk hide button edit n delete from guest-->
        @if (Auth::user()->id == $post->user_id) <!--*Show edit and delete post button only to posters-->
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

            {!!Form::open(['action' => ['PostsController@destroy',$post->id ], 'method' => 'POST', 'class'=> 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class'=>'btn btn-danger', 'onclick'=>'return confirm("Are you sure to delete this?")'])}}
            {!! Form::close() !!}
        @endif
    @endif

@endsection
