@extends('kadmin.articles.template')

@section('form')
	{!! Form::model($post, ['route' => ['kadmin.articles.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
@stop
