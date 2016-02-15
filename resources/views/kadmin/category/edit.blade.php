@extends('kadmin.category.template')

@section('form')
	{!! Form::model($post, ['route' => ['kadmin.category.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
@stop
