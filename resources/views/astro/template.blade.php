<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <title>
        @yield('title', trans('front/site.title') ) </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', trans('front/site.title') ) </title>">
    <meta name="author" content="">

    @yield('head')

    <link rel="shortcut icon" href="/images/favicon.ico">
    <!-- CSS STYLES -->
    {!! HTML::style('https://yastatic.net/bootstrap/3.3.4/css/bootstrap.min.css') !!}
    {!! HTML::style('/css/prettyPhoto.css') !!}
    {!! HTML::style('/css/flexslider.css') !!}
    {!! HTML::style('/css/animate.css') !!}
    {!! HTML::style('/css/style.css') !!}

            <!-- FONTS -->
    {!! HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic') !!}
    {!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic') !!}

            <!-- SCRIPTS -->
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE]>
    <html class="ie" lang="{{config('app.locale')}}">
    <![endif]-->

    <!-- delete
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/jquery.prettyPhoto.js" type="text/javascript"></script>
        <script src="/js/jquery.isotope.min.js" type="text/javascript"></script>
        <script src="/js/sorting.js" type="text/javascript"></script>
        <script src="/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="/js/jquery.twitter.js" type="text/javascript"></script>
        <script src="/js/superfish.js" type="text/javascript"></script>
        <script src="/js/jquery.flexslider-min.js" type="text/javascript"></script>
        <script src="/js/animate.js" type="text/javascript"></script>
        <script src="/js/myscript.js" type="text/javascript"></script>
        -->

    {!! HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js') !!}
    {!! HTML::script('https://yastatic.net/bootstrap/3.3.4/js/bootstrap.min.js') !!}
    {!! HTML::script('/js/jquery.prettyPhoto.js') !!}
    {!! HTML::script('/js/jquery.isotope.min.js') !!}
    {!! HTML::script('/js/sorting.js') !!}
    {!! HTML::script('/js/jquery-ui.min.js') !!}
    {!! HTML::script('/js/jquery.twitter.js') !!}
    {!! HTML::script('/js/superfish.js') !!}
    {!! HTML::script('/js/jquery.flexslider-min.js') !!}
    {!! HTML::script('js/animate.js') !!}
    {!! HTML::script('/js/myscript.js') !!}


</head>
<body>
<!-- PRELOADER -->
<!--
<img id="preloader" src="/img/loading.gif" alt=""/>
-->
<!-- //PRELOADER --><!-- PAGE -->
<div id="page"><!-- CONTAINER -->
    <div class="container page_block"><!-- WRAPPER -->


        <div style="float: right;margin-right: 220px" class="soc">
            <div style="position: fixed;">
                <ul class="top_social">
                    <li><a class="soc1" href="javascript:void(0);" alt=""></a></li>
                    <!--  <li><a class="soc2" href="javascript:void(0);" alt=""></a></li>-->
                    <li><a class="soc3" href="https://twitter.com/astralogos" title="Twitter" target="_blank"></a></li>
                    <li><a class="soc4" href="javascript:void(0);" alt=""></a></li>
                    <li><a class="soc5" href="javascript:void(0);" alt=""></a></li>
                    <li><a class="soc6" href="javascript:void(0);" alt=""></a></li>
                </ul>
            </div>
        </div>


        <div class="wrapper">
            <!-- HEADER -->
            <header>
                <!-- LOGO -->
                <div class="logo"><a href="/astro/" alt="">Astrologo</a></div>
                <!-- LOGO -->
                @include('astro.menu')
            </header>

            @yield('main')

            <footer class="full_width footer_block">
                <div class="row" data-animated="fadeInUp"><!-- LATEST NEWS -->
                    <div class="col-lg-3 col-md-3 col-sm-6 padbot20"><h2>Latest News</h2>
                        <ul class="recent_posts">
                            <li>
                                <div class="pull-left recent_posts_img"><img src="/imgblog/1.jpg" alt=""/></div>
                                <div class="recent_posts_content"><a class="post_title" href="blog-post.html">Mauris ut
                                        mauris sit amet nisi lobortis</a>

                                    <div class="date_block">October 22, 2020</div>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li>
                                <div class="pull-left recent_posts_img"><img src="/img/blog/2.jpg" alt=""/></div>
                                <div class="recent_posts_content"><a class="post_title" href="blog-post.html">Mauris ut
                                        mauris sit</a>

                                    <div class="date_block">October 22, 2020</div>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <li>
                                <div class="pull-left recent_posts_img"><img src="/img/blog/3.jpg" alt=""/></div>
                                <div class="recent_posts_content"><a class="post_title" href="blog-post.html">Mauris ut
                                        mauris sit</a>

                                    <div class="date_block">October 22, 2020</div>
                                </div>
                                <div class="clear"></div>
                            </li>
                        </ul>
                    </div>
                    <!-- //LATEST NEWS -->
                    <div class="col-lg-3 col-md-3 col-sm-6 padbot20"><h2>Newsletter</h2>

                        <p>Vestibulum sem nulla, euismod ac facilisis in, condimentum adipiscing urna. Ut at diam mi.
                            Vivamus sed ligula odio. Vivamus mattis, justo at suscipit malesuada</p>
                        <!-- NEWSLETTER-FORM -->
                        <form id="newsletter-form" action=""><input type="text" name="Enter your Email..."
                                                                    value="Enter your Email..."
                                                                    onFocus="if (this.value == 'Enter your Email...') this.value = '';"
                                                                    onBlur="if (this.value == '') this.value = 'Enter your Email...';"/><input
                                    class="contact_btn" type="submit" value=""/></form>
                        <!-- //NEWSLETTER-FORM -->

                    </div>
                    <div class="respon_clear"></div>
                    <!-- RECENT TWEETS -->
                    <div class="col-lg-3 col-md-3 col-sm-6 padbot20"><h2>Recent Tweets</h2>
                        <ul class="twitter_list tweet_module"></ul>
                    </div>
                    <!-- //RECENT TWEETS -->
                    <div class="col-lg-3 col-md-3 col-sm-6 padbot20"><h2>Useful Links</h2>
                        <ul class="foot_links">
                            <li><span class="glyphicon glyphicon-play-circle"></span><a href="javascript:void(0);">Aliquam
                                    tempus est sit amet orci</a></li>
                            <li><span class="glyphicon glyphicon-play-circle"></span><a href="javascript:void(0);">Quisque
                                    hendrerit velit erat</a></li>
                            <li><span class="glyphicon glyphicon-play-circle"></span><a href="javascript:void(0);">In
                                    bibendum eros ultricies sit amet.</a></li>
                            <li><span class="glyphicon glyphicon-play-circle"></span><a href="javascript:void(0);">Sed
                                    tempor hendrerit purus vitae</a></li>
                            <li><span class="glyphicon glyphicon-play-circle"></span><a href="javascript:void(0);">Nunc
                                    egestas justo nec enim mollis</a></li>
                        </ul>
                    </div>
                </div>

                <!-- COPYRIGHT -->
                <div class="copyright"><a class="copyright_logo" href="javascript:void(0);">cube</a> <span> &copy;
                        Copyright 2020</span></div>
                <!-- //COPYRIGHT --></footer>
            <!-- //FOOTER --></div>
        <!-- WRAPPER --></div>
    <!-- //CONTAINER --></div>
<!-- //PAGE -->


@yield('scripts')

</body>
</html>