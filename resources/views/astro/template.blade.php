<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <title>{{ trans('front/site.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    @yield('head')

    <link rel="shortcut icon" href="/images/favicon.ico">
    <!-- CSS STYLES -->

    {!! HTML::style('https://yastatic.net/bootstrap/3.3.4/css/bootstrap.min.css') !!}
    {!! HTML::style('/css/prettyPhoto.css') !!}
    {!! HTML::style('/css/flexslider.css') !!}
    <link href="/css/animate.css" rel="stylesheet" type="text/css" media="all"/>
    {!! HTML::style('/css/style.css') !!}
    <link href="/css/colors/" rel="stylesheet" type="text/css" id="colors"/>
    <!-- FONTS -->

    {!! HTML::style('http://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic') !!}
    {!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic') !!}

    <!-- SCRIPTS -->

    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE]><html class="ie" lang="{{config('app.locale')}}"> <![endif]-->

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



        <div class="wrapper"><!-- HEADER -->
            <header><!-- LOGO -->

                <div class="logo"><a href="/astro/" alt="">Astrologo</a></div>
                <!-- LOGO --><!-- MENU -->

                <div class="menu_block clearfix"><!-- RESPONSIVE BUTTON MENU -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse"><span class="glyphicon glyphicon-align-justify"></span>
                        </button>
                    </div>
                    <!-- //RESPONSIVE BUTTON MENU -->
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="first {!! classActivePath2('/') !!} c1" ><a href="/" title="">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true" title="{{ trans('astro/menu.link1') }}"></span></a></li>
                            <li class="sub-menu c2"><a href="javascript:void(0);" title="">{{ trans('astro/menu.link2') }}</a><!-- Mega Menu -->
                                <ul class="mega_menu left">
                                    <li class="col" style="width: 55%"><h5>Профессиональные</h5>
                                        <ol>
                                            <li><a href="typography.html"><span>-</span>Персональный гороскоп</a></li>
                                            <li><a href="shortcodes.html"><span>-</span>Гороскоп совместимости</a></li>
                                            <li><a href="full-width.html"><span>-</span>Гороскоп выбора профессии</a></li>
                                            <li><a href="full-width.html"><span>-</span>Астрология для бизнеса</a></li>
                                            <li><a href="full-width.html"><span>-</span>Гороскоп способностей ребенка</a></li>

                                            <li><a href="full-width.html"><span>-</span>Кармический гороскоп</a></li>
                                            <li><a href="full-width.html"><span>-</span>Гороскоп на месяц</a></li>
                                            <li><a href="full-width.html"><span>-</span>Персональный астропрогноз <nobr>на <b>2016</b> год</nobr> </a></li>
                                        </ol>
                                    </li>

                                    <li class="col" style="width: 45%"><h5>Общие</h5>
                                        <ol>
                                            <li><a href="typography.html"><span>-</span>Гороскоп на каждый день</a></li>
                                            <li><a href="full-width.html"><span>-</span>Черты характера</a></li>
                                            <li><a href="shortcodes.html"><span>-</span>Натальная карта</a></li>
                                            <li><a href="full-width.html"><span>-</span>Влияние планет</a></li>
                                            <li><a href="full-width.html"><span>-</span>Влияние луны</a></li>
                                            <li><a href="full-width.html"><span>-</span>Ваша визитка</a></li>

                                        </ol>
                                    </li>

                                </ul>
                                <!-- //Mega Menu --></li>
                            <li class="sub-menu c3" ><a href="javascript:void(0);" title="">{{ trans('astro/menu.link3') }}</a>
                                <ul>
                                    <li><a href="about.html"><span>-</span>Лунные дни</a></li>
                                    <li><a href="shop.html"><span>-</span>Движение луны</a></li>
                                    <li><a href="product-page.html"><span>-</span>Лунный календарь <nobr>на 2016 год</nobr></a></li>

                                </ul>
                            </li>
                            <li class="sub-menu c4" ><a href="javascript:void(0);" title="">{{ trans('astro/menu.link4') }}</a>
                                <ul>
                                    <li><a href="portfolio1.html"><span>-</span>Натальная астрология</a></li>
                                    <li><a href="portfolio2.html"><span>-</span>Взаимоотношения</a></li>
                                    <li><a href="portfolio3.html"><span>-</span>Финансы</a></li>
                                    <li><a href="portfolio4.html"><span>-</span>Общая информация</a></li>

                                </ul>
                            </li>


                            <li class="last {!!classActivePath2('conta') !!} c5"><a href="/contas/" title="">{{ trans('astro/menu.link5') }}</a></li>
                            <li class="last {!!classActivePath2('contacts') !!} c6" ><a href="/contacts/" title="">{{ trans('astro/menu.link6') }}</a></li>
                            <!--
                            <li class="sub-menu c5"><a href="javascript:void(0);" title="">Blog</a>
                                <ul>
                                    <li><a href="blog.html"><span>-</span>Blog with sidebar</a></li>
                                    <li><a href="blog-post.html"><span>-</span>Blog Post</a></li>
                                </ul>
                            </li>
                            <li class="last c6"><a href="contacts.html" title="">Contacts</a></li>
-->

                            <li class="sub-menu c7" style="float: right"><a href="javascript:void(0);" title="">
                                    <img width="25" height="25" alt="{{ session('locale') }}"  src="{!! asset('img/' . session('locale') . '-flag.png') !!}" /><b class="caret"></b>  </a>

                                <ul>
                                    @foreach ( config('app.languages') as $user)
                                        @if($user !== config('app.locale'))
                                            <li><a href="{!! url('language') !!}/{{ $user }}"><img width="25" height="25" alt="{{ $user }}" src="{!! asset('img/' . $user . '-flag.png') !!}"></a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>




                        </ul>
                    </div>
                </div>


                <!-- //MENU --></header>





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

</body>
</html>