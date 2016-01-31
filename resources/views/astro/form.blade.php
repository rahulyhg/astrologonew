@extends('astro.template')
@section('title', trans('astro/contacts.title'))
@section('main')

    @include('astro.panel', ['left' => trans('astro/contacts.title'), 'right' => ''])


    {!! Form::open(['role' => 'form']) !!}
    {!! Form::control('text', '', 'name', $errors, trans('astro/contacts.name')) !!}
    {!! Form::control('email', '', 'email', $errors, 'E-mail') !!}
    {!! Form::close() !!}



@stop