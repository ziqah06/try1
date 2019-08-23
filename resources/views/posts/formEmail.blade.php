@extends('layouts.app')

@section('content')
    <h1>Send Email</h1>
    <!--{ { Form::open(['action' => 'PostsController@store', 'method'=> 'POST']) }}-->
    {{ Form::open(['action' => 'ContactController@test', 'method'=> 'POST']) }} <!--ContactController@test *test funct mane yg nak simpan-->
    <div class="form-group">
        {{Form::label('title', 'Email')}}
        {{Form::text('email', '', ['class' => 'form-control','placeholder' => 'Email'])}}
    </div>
    <div class="form-group">
        {{Form::label('title', 'Body/Description Message')}}
        {{Form::textarea('message', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body/Description Message'])}}
    </div>
    {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {{ Form::close() }}
@endsection