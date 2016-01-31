@extends('kadmin.template')


@section('main')

	@include('kadmin.partials.entete', ['title' => trans('back/blog.dashboard'), 'icone' => 'pencil', 'fil' => link_to('kadmin/category', 'Category') . ' / Create'])

	<div class="col-sm-12">
		@yield('form')

		<div class="form-group checkbox pull-right">
			<label>
				{!! Form::checkbox('active') !!}
				{{ trans('back/blog.published') }}
			</label>
		</div>

		{!! Form::control('text', 0, 'title', $errors, trans('back/blog.title')) !!}

		<div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
			{!! Form::label('slug', trans('back/blog.permalink'), ['class' => 'control-label']) !!}
			{!! url('/') . '/articles/' . Form::text('slug', null, ['id' => 'permalien']) !!}
			<small class="text-danger">{!! $errors->first('slug') !!}</small>
		</div>


		{!! Form::submit(trans('front/form.send')) !!}

		{!! Form::close() !!}
	</div>

@stop

