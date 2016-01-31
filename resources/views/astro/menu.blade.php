<!-- MENU -->
<div class="menu_block clearfix">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-collapse"><span class="glyphicon glyphicon-align-justify"></span>
        </button>
    </div>

    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="first {!! classActivePath2('/') !!} c1"><a href="/" title="">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"
                                          title="{{ trans('astro/menu.link1') }}"></span></a></li>
            <li class="sub-menu c2"><a href="javascript:void(0);"
                                       title="">{{ trans('astro/menu.link2') }}</a><!-- Mega Menu -->
                <ul class="mega_menu left">
                    <li class="col" style="width: 55%"><h5>Профессиональные</h5>
                        <ol>
                            <li><a href="/"><span>-</span>Персональный гороскоп</a></li>
                            <li><a href="/"><span>-</span>Гороскоп совместимости</a></li>
                            <li><a href="/"><span>-</span>Гороскоп выбора профессии</a>
                            </li>
                            <li><a href="/"><span>-</span>Астрология для бизнеса</a></li>
                            <li><a href="/"><span>-</span>Гороскоп способностей
                                    ребенка</a></li>

                            <li><a href="/"><span>-</span>Кармический гороскоп</a></li>
                            <li><a href="/"><span>-</span>Гороскоп на месяц</a></li>
                            <li><a href="/"><span>-</span>Персональный астропрогноз
                                    <nobr>на <b>2016</b> год</nobr>
                                </a></li>
                        </ol>
                    </li>

                    <li class="col" style="width: 45%"><h5>Общие</h5>
                        <ol>
                            <li><a href="/"><span>-</span>Гороскоп на каждый день</a></li>
                            <li><a href="/"><span>-</span>Черты характера</a></li>
                            <li><a href="/"><span>-</span>Натальная карта</a></li>
                            <li><a href="/"><span>-</span>Влияние планет</a></li>
                            <li><a href="/"><span>-</span>Влияние луны</a></li>
                            <li><a href="/"><span>-</span>Ваша визитка</a></li>

                        </ol>
                    </li>

                </ul>
                <!-- //Mega Menu --></li>
            <li class="sub-menu c3"><a href="javascript:void(0);"
                                       title="">{{ trans('astro/menu.link3') }}</a>
                <ul>
                    <li><a href="/moon/day"><span>-</span>Лунные дни</a></li>
                    <li><a href="/moon/"><span>-</span>Движение луны</a></li>
                    <li><a href="/moon/calendar/"><span>-</span>Лунный календарь
                            <nobr>на 2016 год</nobr>
                        </a></li>

                </ul>
            </li>
            <li class="sub-menu {!!classActivePath2('articles/*') !!} c4"><a href="javascript:void(0);"
                                                                             title="">{{ trans('astro/menu.link4') }}</a>
                <ul>
                    <li class="{!!classActivePath2('articles/category1') !!} c4"><a
                            href="/articles/category1/"><span>-</span>Натальная астрология</a></li>
                    <li class="{!!classActivePath2('articles/category2') !!} c4"><a
                            href="/articles/category2/"><span>-</span>Взаимоотношения</a></li>
                    <li class="{!!classActivePath2('articles/category3') !!} c4"><a
                            href="/articles/category3/"><span>-</span>Финансы</a></li>
                    <li class="{!!classActivePath2('articles/category4') !!} c4"><a
                            href="/articles/category1/"><span>-</span>Общая информация</a></li>
                </ul>
            </li>


            <li class="last {!!classActivePath2('reviews') !!} c5"><a href="/reviews/"
                                                                    title="">{{ trans('astro/menu.link5') }}</a>
            </li>
            <li class="last {!!classActivePath2('contacts') !!} c6"><a href="/contacts/"
                                                                       title="">{{ trans('astro/menu.link6') }}</a>
            </li>
            <li class="sub-menu c7" style="float: right"><a href="javascript:void(0);" title="">
                    <img width="25" height="25" alt="{{ session('locale') }}"
                         src="{!! asset('img/' . session('locale') . '-flag.png') !!}"/><b
                        class="caret"></b> </a>

                <ul>
                    @foreach ( config('app.languages') as $user)
                    @if($user !== config('app.locale'))
                    <li><a href="{!! url('language') !!}/{{ $user }}"><img width="25"
                                                                           height="25"
                                                                           alt="{{ $user }}"
                                                                           src="{!! asset('img/' . $user . '-flag.png') !!}"></a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- //MENU -->