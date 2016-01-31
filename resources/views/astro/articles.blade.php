@extends('astro.template')

@section('title', trans('astro/articles.title'))

@section('main')

@include('astro.panel', ['left' => trans('astro/articles.title'), 'right' => 'search'])








@if (isset($info))
    {{ trans('astro/articles.info-search')}} <strong>{{$info}}</strong>
@endif


<div class="row">

    @foreach($posts as $post)
        <div class="box">
            <div class="col-lg-12">
                <h2>
                    {!! link_to('article/' . $post->slug, $post->title ) !!}
                    <br>
                    <small>{{ $post->user->username }} {{ trans('astro/articles.on') }} {!! $post->created_at . ($post->created_at != $post->updated_at ? trans('front/blog.updated') . $post->updated_at : '') !!}</small>
                </h2>
            </div>
            <div class="col-lg-12">
                <p>{!! $post->summary !!}
                    {!! link_to('article/' . $post->slug, trans('astro/articles.button')) !!}
                </p>
                <hr>
            </div>

        </div>
    @endforeach

    <div class="col-lg-12 text-center">
        {!! $links !!}
    </div>

</div>

@stop

