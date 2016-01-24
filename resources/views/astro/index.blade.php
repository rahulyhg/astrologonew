@extends('astro.template')



@section('main')

<div class="slider_block full_width">
    <div class="flexslider top_slider">
        <ul class="slides">
            <li class="slide1"><img src="/img/slider/slide1_bg.jpg"/>

                <div class="flex_caption1"><p class="FromTop captionDelay2">Nunc id cursus urna, et suscipit
                        purus.</p><span class="FromTop captionDelay1">Aliquam tempus est sit amet orci porta condimentum. Quisque hendrerit velit erat, in bibendum eros ultricies sit amet. Sed tempor hendrerit purus vitae vestibulum</span>
                </div>
                <div class="flex_caption2 FromBottom captionDelay2"></div>
            </li>
            <li class="slide2"><img src="/img/slider/slide2_bg.jpg"/>

                <div class="flex_caption1 FromTop"></div>
            </li>
            <li class="slide3"><img src="/img/slider/slide3_bg.jpg"/>

                <div class="vertical_middle">
                    <div class="flex_caption1 FromTop">Say Something <span
                                class="color_text">Wonderful</span> Here
                    </div>
                    <div class="flex_caption2 FromBottom">Sed fermentum nunc a ante rutrum, laoreet viverra
                        mi feugiat. Phasellus rutrum commodo venenatis. Mauris pulvinar placerat vestibulum.
                        Maecenas vitae felis dapibus tortor pulvinar interdum.
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>


<!-- //SLIDER --><!-- SERVICES -->
<section class="services_block">
    <div class="clearfix" data-appear-top-offset="-100" data-animated="fadeInUp">
        <div class="service_item center"><a href="javascript:void(0);" alt=""><i class="i1"></i>

                <p>Unique Design</p></a></div>
        <div class="service_item center"><a href="javascript:void(0);" alt=""><i class="i2"></i>

                <p>Responsive Layout</p></a></div>
        <div class="service_item center"><a href="javascript:void(0);" alt=""><i class="i3"></i>

                <p>Dedicated Support</p></a></div>
        <div class="service_item center"><a href="javascript:void(0);" alt=""><i class="i4"></i>

                <p>Brand & Identity</p></a></div>
        <div class="service_item center"><a href="javascript:void(0);" alt=""><i class="i5"></i>

                <p>Innovations</p></a></div>
        <div class="service_item center"><a href="javascript:void(0);" alt=""><i class="i6"></i>

                <p>great ideas</p></a></div>
    </div>
</section>
<!-- //SERVICES -->


<p>

  Наш «Звездный сайт» ждал Вас, уважаемый посетитель. Раз Вы пришли к нам, значит, у Вас возникла та или иная причина посоветоваться со звездами, узнать, что они предскажут Вам.
    <br>Представляемый Вам сайт посвящен исключительно астрологии и содержит гороскопы, книги и различные статьи по астрологии.
    <br>Главным разделом астрологии является раздел астрологических предсказаний. На страницах сайта Вы найдете:
<ul  class="list1">
    <li>Гороскопы, характеризующие вашу жизнь (Гороскоп на сегодня, Гороскоп на неделю, месяц и год, Индивидуальный гороскоп);</li>
    <li>Гороскопы о различных видах сочетаемости людей (Любовный гороскоп на сегодня, Гороскоп совместимости, Гороскоп сексуальной совместимости, Любовный гороскоп);</li>
    <li>Гороскопы раздела «Астрология профессий» расскажут Вам о вашем истинном призвании, на кого пойти учится, какую приобрести профессию.</li>
    <li>Гороскопы раздела «Деловая астрология» расскажут о приоритетном для Вас бизнесе, предостерегут от ошибок и необдуманных решений. Специально разработан Гороскоп деловой женщины.</li>
</ul>
<br>
Знакомьтесь с представленными на страницах сайта материалами и помните, что мы можем персонально для Вас составить гороскоп по любой заинтересовавшей Вас области астрологии.
</p>
<br><br><br>


<!--

<section class="projects_block"><h2 class="center">Works</h2>
    <div id="options">
        <ul id="filter" class="option-set" data-option-key="filter">
            <li><a class="selected" href="#filter" data-option-value="*">All</a></li>
            <li><a href="#filter" data-option-value=".branding">Branding</a></li>
            <li><a href="#filter" data-option-value=".illustration">illustration</a></li>
            <li><a href="#filter" data-option-value=".web_design">web design</a></li>
        </ul>
    </div>

    <div class="works_block columns3" data-appear-top-offset="-100" data-animated="fadeInUp">
        <div class="element branding project_item">
            <div class="hover_img"><img src="/img/projects/1.jpg" alt=""/><a class="zoom"
                                                                             href="images/projects/1.jpg"
                                                                             rel="prettyPhoto[portfolio1]"></a>
            </div>
        </div>
        <div class="element illustration project_item">
            <div class="hover_img"><img src="/img/projects/2.jpg" alt=""/><a class="zoom"
                                                                             href="images/projects/2.jpg"
                                                                             rel="prettyPhoto[portfolio1]"></a>
            </div>
        </div>
        <div class="element web_design project_item">
            <div class="hover_img"><img src="/img/projects/3.jpg" alt=""/><a class="zoom"
                                                                             href="images/projects/3.jpg"
                                                                             rel="prettyPhoto[portfolio1]"></a>
            </div>
        </div>
        <div class="element branding project_item">
            <div class="hover_img"><img src="/img/projects/4.jpg" alt=""/><a class="zoom"
                                                                             href="images/projects/4.jpg"
                                                                             rel="prettyPhoto[portfolio1]"></a>
            </div>
        </div>
        <div class="element illustration project_item">
            <div class="hover_img"><img src="/img/projects/5.jpg" alt=""/><a class="zoom"
                                                                             href="images/projects/5.jpg"
                                                                             rel="prettyPhoto[portfolio1]"></a>
            </div>
        </div>
        <div class="element web_design project_item">
            <div class="hover_img"><img src="/imgprojects/6.jpg" alt=""/><a class="zoom"
                                                                            href="images/projects/6.jpg"
                                                                            rel="prettyPhoto[portfolio1]"></a>
            </div>
        </div>
    </div>
</section>
--!>


<!-- //RECENT PROJECTS --><!-- CONTENT INFO -->
<section class="content_info clearfix"><!-- CONTENT INFO TEXT -->
    <div class="cont_info_txt" data-appear-top-offset="-100" data-animated="fadeInLeft">
        <div class="title">say something <span class="color_text">wonderful</span> here</div>
        <p>In dolor eros, mollis non convallis a, sollicitudin non magna. Pellentesque id nibh felis. Etiam
            bibendum luctus lorem lobortis malesuada. Sed dui nulla, tincidunt sed accumsan ut, tempor id
            arcu. Morbi vitae</p></div>
    <!-- CONTENT INFO TEXT --><!-- CONTENT INFO IMAGE -->
    <div class="cont_info_img" data-appear-top-offset="-100" data-animated="fadeInRight"><img
                src="/img/cont_info_img.png" alt=""/></div>
    <!-- CONTENT INFO IMAGE --></section>
<!-- //CONTENT INFO --><!-- FOOTER -->

@stop