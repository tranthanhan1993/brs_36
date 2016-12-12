<div class="row">
    <article class="col-lg-12 col-md-12 col-sm-12">
        <header class="clearfix">
            <h1 class="navbar-brand navbar-brand_"><a href="#">{{ Html::image('user/img/logo.png') }}</a></h1>
            <div class="menuBox clearfix">
                <nav class="navbar navbar-default navbar-static-top tm_navbar clearfix" role="navigation">
                    <ul class="nav sf-menu clearfix sf-js-enabled sf-arrows">
                        <li class="active"><a>{{ trans('master.home') }}</a></li>
                        <li><a href="#">{{ trans('master.history') }}</a></li>
                        <li class="sub-menu"><a class="sf-with-ul">{{ trans('master.category') }}<span></span></a>
                            <ul class="submenu sub-menu" >
                                <li><a href="#">Consectetuer</a></li>
                                <li><a href="#" class="sf-with-ul">Pellentesque sed</a><span></span>
                                    <ul class="sub-menu" >
                                        <li><a href="#">Mauris accumsan</a></li>
                                        <li><a href="#">Nulla vel diam</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Dolor</a></li>
                            </ul>
                        </li>
                        <li><a href="#">{{ trans('master.request') }}</a></li>
                    </ul>
                </nav>
            </div>
            <ul class="head_list">
                <li><a href="/logout">{{ trans('master.logout') }} </a></li>
            </ul>
        </header>
    </article>
</div>
