<!-- BREADCRUMBS -->
<section class="full_width breadcrumbs_block clearfix">
    <div class="breadcrumbs_content">
        <h2 class="pull-left">{{$left}}</h2>
        @if($right=='search')
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
        @else
            <div class="pull-right">{{$right}}</div>
        @endif
    </div>
    <div class="overlay"></div>
    <div class="overlay_black"></div>
</section>
<!-- //BREADCRUMBS -->