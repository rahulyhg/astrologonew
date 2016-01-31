@extends('kadmin.articles.template')

@section('form')
	{!! Form::open(['url' => 'kadmin.articles', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
@stop
