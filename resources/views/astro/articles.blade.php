@extends('astro.template')

@section('main')


        <!-- BREADCRUMBS -->
<section class="full_width breadcrumbs_block clearfix">
    <div class="breadcrumbs_content">
        <h2 class="pull-left">{{ trans('astro/contacts.title') }}</h2>
    </div>
    <div class="pull-right">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['url' => 'articles/search', 'method' => 'get', 'role' => 'form', 'class' => 'pull-right']) !!}

                <input type="text" name="search" placeholder="{{trans('astro/articles.search')}}">

                <!--{!! Form::control('text', null, 'search', $errors, null, null, null, trans('astro/articles.search')) !!}-->

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
<!-- //BREADCRUMBS -->


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

