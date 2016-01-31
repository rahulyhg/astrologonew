@extends('kadmin.template')

@section('main')

	@include('kadmin.partials.entete', ['title' => trans('back/admin.dashboard'), 'icone' => 'dashboard', 'fil' => trans('back/admin.dashboard')])

	<div class="row">

		@include('kadmin/partials/pannel', ['color' => 'primary', 'icone' => 'envelope', 'nbr' => $nbrMessages, 'name' => trans('back/admin.new-messages'), 'url' => 'contact', 'total' => trans('back/admin.messages')])

		@include('kadmin/partials/pannel', ['color' => 'green', 'icone' => 'user', 'nbr' => $nbrUsers, 'name' => trans('back/admin.new-registers'), 'url' => 'user', 'total' => trans('back/admin.users')])

		@include('kadmin/partials/pannel', ['color' => 'yellow', 'icone' => 'pencil', 'nbr' => $nbrPosts, 'name' => trans('back/admin.new-posts'), 'url' => 'blog', 'total' => trans('back/admin.posts')])

		@include('kadmin/partials/pannel', ['color' => 'red', 'icone' => 'comment', 'nbr' => $nbrComments, 'name' => trans('back/admin.new-comments'), 'url' => 'comment', 'total' => trans('back/admin.comments')])

	</div>

@stop


