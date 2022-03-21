<!DOCTYPE html>
<html lang="{!! session()->get('locale') !!}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Eteon - Construction And Building Template">
    <link href="{!! asset('/web/site_general/'.site_settings('logo_url'))  !!}" rel="icon">
    <title>{!! site_settings('title') !!}</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Barlow:400,500,600,700%7cHeebo:400,500,700&amp;display=swap">
    <link rel="stylesheet" href="{!! asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/use.fontawesome.com/releases/v5.1.1/css/all.css') !!}">
    <link rel="stylesheet" href="{!! asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/css/libraries.css') !!}">
    <link rel="stylesheet" href="{!! asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/css/style.css') !!}">
</head>


<body>
<div class="wrapper">
    <div class="preloader">
        <div class="loading">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
    </div><!-- /.preloader -->
@if(\App\Business\ThemeEditor::groupSection('Header Grubu',1) >0)
    <?php $group = \App\Business\ThemeEditor::getGroupId('Header Grubu')  ?>

    <!-- =========================
        Header
    =========================== -->
        <header class="header header-layout2">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        {!!  (site_settings('logo_url') != null) ? '<img src="'.asset('/web/site_general/'.site_settings('logo_url')).'" class="logo-dark" alt="'.site_settings('title').'">' : site_settings('title')   !!}
                    </a>
                    <div class="header-topbar d-none d-lg-block">
                        <div class="d-flex flex-wrap">
                            <ul class="header-topbar__contact d-flex flex-wrap list-unstyled mb-0">
                                <li>
                                    <i class="icon-phone1"></i>
                                    <div>
                                        <span>Arayın:</span><strong><a href="tel:{!! site_settings('phone') !!}">{!! site_settings('phone') !!}</a></strong>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon-envelope1"></i>
                                    <div>
                                        <span>Email:</span><strong><a href="mailto:{!! site_settings('email') !!}">{!! site_settings('email') !!}</a></strong>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon-clock1"></i>
                                    <div>
                                        <span>{!! \App\Business\ThemeEditor::sectionValue('header_working_hours','Çalışma Saatleri Header','Çalışma Saatleri Header','text',$group,session()->get('locale')) !!}</span><strong>{!! site_settings('working_hours') !!}</strong>
                                    </div>
                                </li>


                            </ul>
                            <a href="{!! \App\Business\ThemeEditor::sectionValue('header_button_link','/','İletişim butonu Linki','text',$group,session()->get('locale')) !!}" class="btn btn__secondary header__btn">
                                <i class="icon-arrow-right1"></i><span>{!! \App\Business\ThemeEditor::sectionValue('header_button_text','İletişim','İletişim Butonu Yazısı','text',$group,session()->get('locale')) !!}</span>
                            </a>


                        </div>
                    </div><!-- /.header-topbar -->
                    <button class="navbar-toggler" type="button">
                        <span class="menu-lines"><span></span></span>
                    </button>
                </div><!-- /.container -->
                <div class="navbar__bottom sticky-navbar">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="mainNavigation">
                            <ul class="navbar-nav">




                                {!! \App\Business\WebMenuView::menuView('0','<li class="nav__item with-dropdown">

                                    <a href="','" class="dropdown-toggle nav__item-link">','</a>
                                    <i data-toggle="dropdown" class="fa fa-angle-down d-block d-lg-none"></i>
    ',
    ' </li><!-- /.nav-item -->','<ul class="dropdown-menu">','
                                        <li class="nav__item"><a href="','" class="nav__item-link">','</a></li>
                                        <!-- /.nav-item -->
                                    ','</ul>') !!}


                                <li class="nav__item with-dropdown">

                                    <a href="#" class="dropdown-toggle nav__item-link">{!! \App\Business\MutliLang::active_lang_name(session()->get('locale')); !!}</a>
                                    <i data-toggle="dropdown" class="fa fa-angle-down d-block d-lg-none"></i>
                                    <ul class="dropdown-menu">



                                        <li class="nav__item with-dropdown">

                                            <select class="changeLang dropdown-toggle nav__item-link">

                                                <?php $session_lang = session()->get('locale'); ?>

                                                {!! \App\Business\MutliLang::lang_select_for_view($session_lang);   !!}

                                            </select>
                                        </li>


                                    </ul><!-- /.navbar-nav -->

                                </li>



                            </ul><!-- /.navbar-nav -->

                        </div><!-- /.navbar-collapse -->
                        <div class="header-actions d-none d-lg-block">
                            <ul class="header-actions__list list-unstyled d-flex align-items-center mb-0">





                                <li>

                                    <form class="header-search__form" action="{!! route('blog.search') !!}" method="get">
                                        <input type="text" name="keys" placeholder="{!! \App\Business\ThemeEditor::sectionValue('search_place_holder','Arayın...','Arama Alanı Yazısı','text',$group,session()->get('locale')) !!}" class="form-control">
                                        <button class="header-search__btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </div><!-- /.header-actions -->
                    </div><!-- /.container -->
                </div><!-- /.navbar-bottom -->
            </nav><!-- /.navabr -->
        </header><!-- /.Header -->
@endif

@yield('content')

@if(\App\Business\ThemeEditor::groupSection('Footer Grubu',1) >0)
    <?php $group = \App\Business\ThemeEditor::getGroupId('Footer Grubu') ?>
    <!-- ========================
      Footer
    ========================== -->
        <footer class="footer">
            <div class="footer-contact">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-4 col-sm-12 col-md-12 col-lg-8 d-flex flex-wrap justify-content-between">
                            <div class="footer-contact__item d-flex align-items-center">
                                <div class="footer-contact__icon">
                                    <i class="icon-phone1"></i>
                                </div><!-- /.footer-contact__icon -->
                                <div class="footer-contact__text">
                                    <span>Arayın:</span>
                                    <strong><a href="tel:{!! site_settings('phone') !!}">{!! site_settings('phone') !!}</a></strong>
                                </div><!-- /.footer-contact__text -->
                            </div><!-- /.footer-contact__item -->
                            <div class="footer-contact__item d-flex align-items-center">
                                <div class="footer-contact__icon">
                                    <i class="icon-envelope1"></i>
                                </div><!-- /.footer-contact__icon -->
                                <div class="footer-contact__text">
                                    <span>Email:</span>
                                    <strong><a href="mailto:{!! site_settings('email') !!}">{!! site_settings('email') !!}</a></strong>
                                </div><!-- /.footer-contact__text -->
                            </div><!-- /.footer-contact__item -->
                            <div class="footer-contact__item d-flex align-items-center">
                                <div class="footer-contact__icon">
                                    <i class="icon-clock1"></i>
                                </div><!-- /.footer-contact__icon -->
                                <div class="footer-contact__text">
                                    <span>Çalışma Saatleri:</span>
                                    <strong>{!! site_settings('working_hours') !!}</strong>
                                </div><!-- /.footer-contact__text -->
                            </div><!-- /.footer-contact__item -->
                        </div><!-- /.col-lg-8 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-contact -->
            <div class="footer-primary bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 footer-widget footer-widget__newsletter">
                            <div class="footer-widget__newsletter__form">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('email_sub_img','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','E-Mail Abone Olma Resimi','text',$group,session()->get('locale')) !!}">

                                <h6 class="footer-widget__newsletter__title">{!! \App\Business\ThemeEditor::sectionValue('email_sub_title','Bültene Abone Olun','Bülten Başlığı Yazısı','text',$group,session()->get('locale')) !!}</h6>
                                <div class="form-group mb-0">
                                    @csrf
                                    <input type="hidden" name="post" value="{!! route('subscribe.add') !!}">
                                    <input type="text" class="form-control" id="subscribe_email" placeholder="{!! \App\Business\ThemeEditor::sectionValue('email_sub_placeholder','E-Posta Adresiniz','E-Posta Adresi Yazısı','text',$group,session()->get('locale')) !!}">
                                    <button type="submit" id="subscribe" class="btn btn__primary">{!! \App\Business\ThemeEditor::sectionValue('email_sub_button','Abone Ol','Abone Ol Butonu','text',$group,session()->get('locale')) !!}</button>
                                    <div id="subscribeFormMessage" class="btn btn-success"></div>
                                </div>
                            </div>
                        </div><!-- /.col-xl-4 -->
                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 footer-widget">
                            <h6 class="footer-widget__title">{!! \App\Business\ThemeEditor::sectionValue('email_sub_right_text_title','Kısa Hakkımızda Alanı','Kısa Hakkımızda Alanı','text',$group,session()->get('locale')) !!}</h6>
                            <div class="footer-widget__content">
                                <p class="mb-20">{!! \App\Business\ThemeEditor::sectionValue('email_sub_right_text','Merhaba bu script laravel ile kodlanmıştır.','E-Mail Alt Sağ Yazı','text',$group,session()->get('locale')) !!}</p>
                                <a href="{!! \App\Business\ThemeEditor::sectionValue('email_sub_right_text_botom_button_link','/','E-Mail Alt Sağ Linki','text',$group,session()->get('locale')) !!}" class="btn btn__primary btn__link btn__icon">
                                    <i class="icon-arrow-right1"></i><span>{!! \App\Business\ThemeEditor::sectionValue('email_sub_right_text_botom_button_text','Detaylar','Detaylar buton yazısı','text',$group,session()->get('locale')) !!}</span>
                                </a>
                            </div><!-- /.footer-widget__content -->
                        </div><!-- /.col-xl-2 -->
                        <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 footer-widget footer-widget-nav">
                            <h6 class="footer-widget__title">{!! \App\Business\ThemeEditor::sectionValue('footer_menu_title','Alt Alan Menüsü Başlığı','Alt Alan Menü Başlığı','text',$group,session()->get('locale')) !!}</h6>
                            <div class="footer-widget__content">
                                <nav>
                                    <ul class="list-unstyled">
                                        {!! \App\Business\WebMenuView::menuView('2','<li><a href="','">','</a>','</li>') !!}

                                    </ul>
                                </nav>
                            </div><!-- /.footer-widget__content -->
                        </div><!-- /.col-xl-2 -->
                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 footer-widget">
                            <h6 class="footer-widget__title">{!! \App\Business\ThemeEditor::sectionValue('footer_quick_contact_title','Hızlı iletişim','Hızlı İletişim Başlığı','text',$group,session()->get('locale')) !!}</h6>
                            <div class="footer-widget__content">
                                <p>{!! \App\Business\ThemeEditor::sectionValue('footer_quick_contact_text','Burası hızlı iletişim için bir mesaj alanıdır.','Hızlı İletişim Mesajı','text',$group,session()->get('locale')) !!}</p>

                                <p class="footer-contact__phone d-flex align-items-center">
                                    <i class="icon-phone1"></i>
                                    <a href="tel:{!! site_settings('phone') !!}">{!! site_settings('phone') !!}</a>
                                </p>
                            </div><!-- /.footer-widget__content -->
                        </div><!-- /.col-xl-4 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-primary -->
            <div class="footer-secondary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-8 d-flex flex-wrap align-items-center">
                            {!!  (site_settings('logo_url') != null) ? '<img src="'.asset('/web/site_general/'.site_settings('logo_url'))  .'" alt="'.site_settings('title').'" class="mr-20 w-25">' : site_settings('title')   !!}

                            <nav>
                                <ul class="footer__copyright-links list-unstyled d-flex flex-wrap mb-0">

                                    {!! \App\Business\WebMenuView::menuView('3','<li><a href="','">','</a>','</li>') !!}

                                </ul>
                                <p class="mb-0"> &copy; {!! date("Y") !!} {!! site_settings('title') !!}. Prepared by
                                    <a class="color-secondary" href="http://webkedi.net">WebKedi.net</a>
                                </p>
                            </nav>
                        </div><!-- /.col-lg-8 -->
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <ul class="social__icons list-unstyled justify-content-end mb-0">
                                @if(site_settings('fb_url') != null)
                                    <li><a href="{!! site_settings('fb_url') !!}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if(site_settings('ig_uname') != null)
                                    <li><a href="https://instagram.com/{!! site_settings('ig_uname') !!}"><i class="fab fa-instagram"></i></a></li>
                                @endif
                                @if(site_settings('tt_uname') != null)

                                    <li><a href="https://twitter.com/{!! site_settings('tt_uname') !!}"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if(site_settings('yt_url') != null)

                                    <li><a href="{!! site_settings('tt_uname') !!}"><i class="fab fa-youtube"></i></a></li>
                                @endif
                                @if(site_settings('git_url') != null)

                                    <li><a href="{!! site_settings('git_url') !!}"><i class="fab fa-github"></i></a></li>
                                @endif

                            </ul><!-- /.social-icons -->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-secondary -->
        </footer><!-- /.Footer -->
        <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>
    @endif
</div><!-- /.wrapper -->

<script src="{!! asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/js/jquery-3.5.1.min.js') !!}"></script>
<script src="{!! asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/js/plugins.js') !!}"></script>
<script src="{!! asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/js/main.js') !!}"></script>
<script src="{!! asset('/web/assets/forms/post.js') !!}"></script>
</body>

<script type="text/javascript">

    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });

</script>
</html>
