@extends('web.'.active_theme_dir().'.layouts.app')

@section('content')
php
    @if(\App\Business\ThemeEditor::groupSection('Slider Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Slider Grubu') ?>
        <!-- ============================
        Slider
    ============================== -->
        <section class="slider slider-layout1">
            <div class="slick-carousel carousel-arrows-light carousel-dots-light m-slides-0"
                 data-slick='{"slidesToShow": 1, "arrows": true, "dots": true, "speed": 700,"fade": true,"cssEase": "linear"}'>

                @foreach($sliders as $slider)
                    <div class="slide-item align-v-h bg-overlay">
                        <div class="bg-img"><img src="{!! asset('/web/sliders/'.$slider->img_url) !!}" alt="{!! $slider->title !!}">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                    <div class="slide__content">
                                        <h2 class="slide__title">{!! $slider->title !!}</h2>
                                        <p class="slide__desc">{!! $slider->content !!} </p>
                                        <a href="{!! \App\Business\ThemeEditor::sectionValue('slider_button1_link','/','Slider 1. buton linki','text',$group,session()->get('locale')) !!}"
                                           class="btn btn__secondary mr-30">
                                            <i class="icon-arrow-right1"></i><span>{!! \App\Business\ThemeEditor::sectionValue('slider_button1_title','Hakkımızda','Slider 2. Buton Metni','text',$group,session()->get('locale')) !!}</span>
                                        </a>
                                        <a href="{!! \App\Business\ThemeEditor::sectionValue('slider_button2_link','/','Slider 2. buton linki','url',$group,session()->get('locale')) !!}"
                                           class="btn btn__white">{!! \App\Business\ThemeEditor::sectionValue('slider_button2_title','Anasayfa','Slider 2. Buton Metni','text',$group,session()->get('locale')) !!}</a>
                                    </div><!-- /.slide-content -->
                                </div><!-- /.col-xl-8 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.slide-item -->
                @endforeach

            </div><!-- /.carousel -->
        </section><!-- /.slider -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Hakkımızda Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Hakkımızda Grubu')  ?>
        <!-- ========================
      About Layout 2
    =========================== -->
        <section class="about-layout2 pb-50">
            <div class="container">
                <div class="row mb-50 align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="heading-layout2 mb-20">
                            <h2 class="heading__subtitle">{!! \App\Business\ThemeEditor::sectionValue('heading_subtitle','Header Altbaşlık','Alan 1 Küçük Başlık','text',$group,session()->get('locale')) !!}</h2>
                            <h3 class="heading__title">{!! \App\Business\ThemeEditor::sectionValue('heading_title','Header Başlık','Alan 1 Büyük Başlık','text',$group,session()->get('locale')) !!}
                            </h3>
                        </div><!-- /heading -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1 d-flex justify-content-end counters-wrapper">
                        <!-- counter item #1 -->
                        <div class="counter-item">
                            <h4 class="counter">{!! \App\Business\ThemeEditor::sectionValue('counter1','10','Sayaç 1 Numara','number',$group,session()->get('locale')) !!}</h4>
                            <p class="counter-item__desc">{!! \App\Business\ThemeEditor::sectionValue('counter1_desc','100','Sayaç 1 Açıklama','text',$group,session()->get('locale')) !!}</p>
                        </div>
                        <!-- counter item #2 -->
                        <div class="counter-item">
                            <h4 class="counter">{!! \App\Business\ThemeEditor::sectionValue('counter2','20','Sayaç 2 Sayı','number',$group,session()->get('locale')) !!}</h4>
                            <p class="counter-item__desc">{!! \App\Business\ThemeEditor::sectionValue('counter2_desc','100','Sayaç 2 Açıklama','text',$group,session()->get('locale')) !!}</p>
                        </div>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <p class="heading__desc mb-30">{!! \App\Business\ThemeEditor::sectionValue('heading_desc1','Üst Paragraf 1','Üst Paragraf','text',$group,session()->get('locale')) !!}</p>
                        <p class="heading__desc">{!! \App\Business\ThemeEditor::sectionValue('heading_desc2','Üst Paragraf 2','Alt Paragraf','text',$group,session()->get('locale')) !!}</p>
                        <ul class="list-items list-unstyled mb-20 mt-40">
                            <li>{!! \App\Business\ThemeEditor::sectionValue('list_item1','Madde 1','Liste Elemanı','text',$group,session()->get('locale')) !!}</li>
                            <li>{!! \App\Business\ThemeEditor::sectionValue('list_item2','Madde 2','Liste Elemanı','text',$group,session()->get('locale')) !!}</li>
                            <li>{!! \App\Business\ThemeEditor::sectionValue('list_item3','Madde 3','Liste Elemanı','text',$group,session()->get('locale')) !!}</li>
                            <li>{!! \App\Business\ThemeEditor::sectionValue('list_item4','Madde 4','Liste Elemanı','text',$group,session()->get('locale')) !!}</li>
                            <li>{!! \App\Business\ThemeEditor::sectionValue('list_item5','Madde 5','Liste Elemanı','text',$group,session()->get('locale')) !!}</li>
                            <li>{!! \App\Business\ThemeEditor::sectionValue('list_item6','Madde 6','Liste Elemanı','text',$group,session()->get('locale')) !!}</li>

                        </ul>
                        <a href="{!! \App\Business\ThemeEditor::sectionValue('heading_button_link','/','Alan 1 Buton Linki','url',$group,session()->get('locale')) !!}"
                           class="btn btn__primary btn__lg mb-30">
                            <i class="icon-arrow-right1"></i><span>{!! \App\Business\ThemeEditor::sectionValue('heading_button','Buton Başlığı','Alan 1 Buton Metni','text',$group,session()->get('locale')) !!}</span>
                        </a>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="about__img">
                            <img
                                src="{!! \App\Business\ThemeEditor::sectionValue('about_img',asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/images/about/1.jpg'),'Alan 1 Resim Linki','text',$group,session()->get('locale'))  !!}"
                                alt="about" class="img-fluid">
                            <div class="cta-banner">
                                <div class="cta-banner__icon">
                                    <i class="icon-hard-hat"></i>
                                </div>
                                <h5 class="cta-banner__title ">{!! \App\Business\ThemeEditor::sectionValue('cta_banner_title','CTA Başlık','Alan 1 CTA Başlık','text',$group,session()->get('locale')) !!}</h5>
                                <a href="{!! \App\Business\ThemeEditor::sectionValue('cta_banner_link','/','Alan 1 CTA Linki','url',$group,session()->get('locale')) !!}"
                                   class="btn btn__primary btn__link"><i class="icon-arrow-right1"></i></a>
                            </div><!-- /.cta-banner -->
                        </div><!-- /.about-img -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.About Layout 2 -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Hizmetlerimiz Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Hizmetlerimiz Grubu')  ?>

        <!-- ===========================
      Features Carousel
    ============================= -->
        <section class="features-carousel pb-50 bg-gray">
            <div class="bg-img"><img
                    src="{!! asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/images/backgrounds/map.png') !!}"
                    alt="background"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                        <div class="heading text-center mb-40">
                            <span
                                class="heading__subtitle">{!! \App\Business\ThemeEditor::sectionValue('services_section_subtitle','Hizmetlerimiz','Hizmetlerimiz Alanı Alt Başlık','text',$group,session()->get('locale')) !!}</span>
                            <h2 class="heading__title">{!! \App\Business\ThemeEditor::sectionValue('services_section_title','Hizmetlerimiz','Hizmetlerimiz Alanı Başlık','text',$group,session()->get('locale')) !!}</h2>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="slick-carousel"
                             data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>

                        @foreach($services as $blog)

                            <!-- Feature Item #1 -->
                                <div class="feature-item">
                                    <div class="feature-item__icon">
                                        <img src="{!! asset('/web/services/'.$blog->img_url) !!}" alt="">
                                    </div><!-- /.feature-item__icon -->
                                    <h4 class="feature-item__title">{!! $blog->title !!}</h4>

                                </div><!-- /.portfolio-item -->
                            @endforeach


                        </div><!-- /.carousel -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Features Carousel -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Banner 1 Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Banner 1 Grubu')  ?>

        <!-- =========================
       Banner layout 1
      =========================== -->
        <section class="banner-layout1 pb-100 banner-gray-top bg-secondary">
            <div class="container-fluid col-padding-0">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 background-banner">
                        <div class="bg-img">
                            <img
                                src="{!! \App\Business\ThemeEditor::sectionValue('banner_one_bg',asset('web/assets/'.\App\Business\ActiveTheme::active_dir().'/images/banners/1.jpg'),'İletişim Alanı Arkaplanı','text',$group,session()->get('locale')) !!}"
                                alt="banner">
                        </div>
                        <div class="cta-banner">
                            <h4 class="cta-banner__subtitle ">{!! \App\Business\ThemeEditor::sectionValue('banner_mini_title','40','Banner Mini Başlık','text',$group,session()->get('locale')) !!}</h4>
                            <h5 class="cta-banner__title ">{!! \App\Business\ThemeEditor::sectionValue('banner_mini_desc','Yıllık Tecrübe','Banner Mini Açıklama','text',$group,session()->get('locale')) !!}</h5>
                            <a href="{!! \App\Business\ThemeEditor::sectionValue('banner_mini_link','/','Banner Mini Link','text',$group,session()->get('locale')) !!}"
                               class="btn btn__primary btn__link"><i class="icon-arrow-right1"></i></a>
                        </div><!-- /.cta-banner -->
                        <div class="video__box">
                            <a class="video__btn video__btn-white popup-video"
                               href="{!! \App\Business\ThemeEditor::sectionValue('youTube_video_link','https://www.youtube.com/watch?v=SwzXTe_GW-Y&ab_channel=WebKedi','YouTube Linki','text',$group,session()->get('locale')) !!}">
                                <div class="video__player">
                                    <span class="video__player-animation"></span>
                                    <span class="video__player-animation video__player-animation-2"></span>
                                    <i class="fa fa-play"></i>
                                </div>
                            </a>
                            <div class="video__box-text">
                                <span
                                    class="color-white">{!! \App\Business\ThemeEditor::sectionValue('video_button','Videoyu İzle','Video Banner Button Yazısı','text',$group,session()->get('locale')) !!}</span>
                            </div>
                        </div><!-- /.video__box -->
                    </div><!-- /.col-xl-6 -->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="inner-padding py-0">
                            <div class="heading-layout2 heading-light mb-40">
                                <h3 class="heading__title">{!! \App\Business\ThemeEditor::sectionValue('banner_title_videos','Bu bir videolu bannerdır','Video Banner Başlık','text',$group,session()->get('locale')) !!}</h3>
                                <p class="heading__desc">{!! \App\Business\ThemeEditor::sectionValue('banner_desc_videos','Bu bir videolu bannerdır ve bu alan açıklamasıdır','Video Banner Açıklama','text',$group,session()->get('locale')) !!}
                                </p>
                            </div><!-- /.heading -->
                            <div class="d-flex flex-wrap justify-content-between fancybox-wrapper">
                                <!-- fancybox item #1 -->
                                <div class="fancybox-item">
                                    <div class="fancybox-item__icon">
                                        <img src="{!! \App\Business\ThemeEditor::sectionValue('video_banner_img1','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','Banner Mini Başlık','text',$group,session()->get('locale')) !!}">
                                    </div><!-- /.fancybox-icon -->
                                    <div class="fancybox-item__content">
                                        <h4 class="fancybox-item__title">{!! \App\Business\ThemeEditor::sectionValue('video_banner_img1_desc','İlk görsel açıklaması','Video Banner Mini Açıklama','text',$group,session()->get('locale')) !!}</h4>
                                    </div><!-- /.fancybox-content -->
                                </div><!-- /.fancybox-item -->
                                <!-- fancybox item #2 -->
                                <div class="fancybox-item">
                                    <div class="fancybox-item__icon">
                                        <img src="{!! \App\Business\ThemeEditor::sectionValue('video_banner_img2','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','Video Banner Resim','text',$group,session()->get('locale')) !!}">

                                    </div><!-- /.fancybox-icon -->
                                    <div class="fancybox-item__content">
                                        <h4 class="fancybox-item__title">{!! \App\Business\ThemeEditor::sectionValue('video_banner_img2_desc','İkinci görsel açıklaması','Video Banner Açıklama','text',$group,session()->get('locale')) !!}</h4>

                                    </div><!-- /.fancybox-content -->
                                </div><!-- /.col-lg-4 -->
                                <!-- fancybox item #3 -->
                                <div class="fancybox-item">
                                    <div class="fancybox-item__icon">
                                        <img src="{!! \App\Business\ThemeEditor::sectionValue('video_banner_img3','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','Video Banner Resim','text',$group,session()->get('locale')) !!}">

                                    </div><!-- /.fancybox-icon -->
                                    <div class="fancybox-item__content">
                                        <h4 class="fancybox-item__title">{!! \App\Business\ThemeEditor::sectionValue('video_banner_img3_desc','Son görsel açıklaması','Video Banner Görsel Açıklaması','text',$group,session()->get('locale')) !!}</h4>

                                    </div><!-- /.fancybox-content -->
                                </div><!-- /.fancybox-item -->
                            </div><!-- /.row -->
                            <p class="color-white mb-20">
                                {!! \App\Business\ThemeEditor::sectionValue('video_banner_footer_desc','burası banner için son metin girşii alanıdır bu alanı diledğiniz gibi doldurabilirisniz.','Video Banner Açıklama','text',$group,session()->get('locale')) !!}
                            </p>
                            <img
                                src="{!! \App\Business\ThemeEditor::sectionValue('video_banner_footer_img',asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/images/about/singnture.png'),'Video Banner Resim','text',$group,session()->get('locale')) !!}"
                                alt="singnture">
                        </div>
                    </div><!-- /.col-xl-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Banner layout 1 -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Galeri Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Galeri Grubu')  ?>

        <!-- ===========================
      portfolio carousel
    ============================= -->
        <section class="portfolio-carousel pb-60">
            <div class="container">
                <div class="row align-items-center mb-20">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <h2 class="heading__subtitle">{!! \App\Business\ThemeEditor::sectionValue('gallery_subtitle','Galeri Alt Başlığı','Galeri Alt Başlığı','text',$group,session()->get('locale')) !!}</h2>
                        <h3 class="heading__title mb-20">{!! \App\Business\ThemeEditor::sectionValue('gallery_subtitle','Galeri Başlığı','Galeri Başlığı','text',$group,session()->get('locale')) !!}</h3>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-12 col-lg-7">
                        <nav id="slick-filter-buttons" class="nav nav-tabs justify-content-end mt-50 mt-0-xs-sm">
                            <a href="{!! \App\Business\ThemeEditor::sectionValue('gallery_footer_link','/','Başlığı','text',$group,session()->get('locale')) !!}"
                               class="nav__link active"
                               data-value="all">{!! \App\Business\ThemeEditor::sectionValue('gallery_filter_all_title','Tümünü Gör','Galeri Tümünü Gör Başlığı','text',$group,session()->get('locale')) !!}</a>
                        </nav>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="slick-carousel" id="filter-carousel"
                             data-slick='{"slidesToShow": 4, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 768, "settings": {"slidesToShow": 1}}]}'>

                        @foreach($galleries as $gallery)

                            <!-- portfolio item #1 -->
                                <div class="portfolio-item Construction all">
                                    <div class="portfolio-item__img">
                                        <img src="{!! asset('/web/gallery/'.$gallery->img_url) !!}"
                                             alt="{!! $gallery->title !!}">
                                    </div><!-- /.portfolio-img -->
                                    <div class="portfolio-item__hover">
                                        <div class="portfolio-item__content">
                                            <h4 class="portfolio-item__title"><a href="{!! $gallery->gallery_url !!}" style="
 -webkit-text-stroke-width: 1px;
-webkit-text-stroke-color: #000000;">{!! $gallery->title !!}</a>
                                            </h4>

                                        </div><!-- /.portfolio-content -->
                                    </div><!-- /.portfolio-item__hover -->
                                </div><!-- /.portfolio-item -->
                            @endforeach


                        </div><!-- /.carousel -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-end">
                        <a href="{!! \App\Business\ThemeEditor::sectionValue('gallery_footer_link','/','Footer Link','text',$group,session()->get('locale')) !!}"
                           class="btn btn__link btn__loadMore">
                            <span
                                class="mr-2">{!! \App\Business\ThemeEditor::sectionValue('gallery_footer_link_title','Footer Link Başlığı','Footer Link Başlığı','text',$group,session()->get('locale')) !!}</span>
                            <i class="icon-arrow-right1"></i>
                        </a>
                    </div><!-- /.col-lg-12 -->
                </div>
            </div><!-- /.container -->
        </section><!-- /.portfolio carousel -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Referanslarımız Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Referanslarımız Grubu')  ?>

        <!-- =====================
         Clients
      ======================== -->
        <section class="clients border-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h4>{!! \App\Business\ThemeEditor::sectionValue('clients_title','Birlikte Çalıştığımız Markalar/Referanslarımız','Referanslar Başlığı','text',$group,session()->get('locale')) !!}</h4>
                        <div class="slick-carousel"
                             data-slick='{"slidesToShow": 6, "arrows": false, "dots": false, "autoplay": true,"autoplaySpeed": 2000, "infinite": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 4}}, {"breakpoint": 767, "settings": {"slidesToShow": 3}}, {"breakpoint": 480, "settings": {"slidesToShow": 2}}]}'>
                            @foreach($clients as $client)
                                <div class="client">
                                    <img src="{!! asset('/web/clients/'.$client->img_url) !!}"
                                         alt="{!! $client->title !!}">
                                </div><!-- /.client -->
                            @endforeach
                        </div><!-- /.carousel -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.clients -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Banner 2 Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Banner 2 Grubu')  ?>

        <!-- =========================
       Banner layout 3
      =========================== -->
        <section class="banner-layout3 bg-overlay bg-overlay-gradient">
            <div class="bg-img">
                <img src="{!! \App\Business\ThemeEditor::sectionValue('banner_2_bg',asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/images/banners/4.jpg'),'İletişim Alanı Arkaplanı','text',$group,session()->get('locale')) !!}"
                     alt="banner">
            </div>
            <div class="container">
                <div class="row heading-layout3 heading-light mb-40">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h2 class="heading__subtitle color-secondary">{!! \App\Business\ThemeEditor::sectionValue('contact_banner_subtilte','İletişm Bannerı Alt Başlığı','İletişim Başlığı','text',$group,session()->get('locale')) !!}</h2>
                    </div><!-- /.col-lg-12 -->
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h3 class="heading__title">{!! \App\Business\ThemeEditor::sectionValue('contact_banner_tilte','İletişm Bannerı Başlığı','İletişm Bannerı Başlığı','text',$group,session()->get('locale')) !!}</h3>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <p class="heading__desc">{!! \App\Business\ThemeEditor::sectionValue('contact_banner_desc','İletişm Bannerı Açıklama Alanıdır','İletişm Bannerı Açıklama Alanı','text',$group,session()->get('locale')) !!}</p>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <!-- fancybox item #1 -->
                        <div class="fancybox-item">
                            <div class="fancybox-item__icon">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('contact_banner_img1','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','Başlığı','text',$group,session()->get('locale')) !!}">

                            </div><!-- /.fancybox-icon -->
                            <div class="fancybox-item__content">
                                <h4 class="fancybox-item__title">{!! \App\Business\ThemeEditor::sectionValue('contact_banner_img1_desc','İletişm Bannerı Resim 1 Başlığı','İletişm Bannerı Resim 1 Başlığı','text',$group,session()->get('locale')) !!}</h4>
                            </div><!-- /.fancybox-content -->
                        </div><!-- /.fancybox-item -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <!-- fancybox item #2 -->
                        <div class="fancybox-item">
                            <div class="fancybox-item__icon">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('contact_banner_img2','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','İletişim Bannerı 2','text',$group,session()->get('locale')) !!}">

                            </div><!-- /.fancybox-icon -->
                            <div class="fancybox-item__content">
                                <h4 class="fancybox-item__title">{!! \App\Business\ThemeEditor::sectionValue('contact_banner_img2_desc','İletişm Bannerı Resim 2 Başlığı','İletişm Bannerı Resim 2 Başlığı','text',$group,session()->get('locale')) !!}</h4>
                            </div><!-- /.fancybox-content -->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <!-- fancybox item #3 -->
                        <div class="fancybox-item">
                            <div class="fancybox-item__icon">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('contact_banner_img3','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','İletişim Banneri Resim 3','text',$group,session()->get('locale')) !!}">

                            </div><!-- /.fancybox-icon -->
                            <div class="fancybox-item__content">
                                <h4 class="fancybox-item__title">{!! \App\Business\ThemeEditor::sectionValue('contact_banner_img3_desc','İletişm Bannerı Resim 3 Başlığı','İletişm Bannerı Resim 3 Başlığı','text',$group,session()->get('locale')) !!}</h4>
                            </div><!-- /.fancybox-content -->
                        </div><!-- /.fancybox-item -->
                    </div><!-- /.col-lg-3 -->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <!-- fancybox item #3 -->
                        <div class="fancybox-item">
                            <div class="fancybox-item__icon">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('contact_banner_img4','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','İletişim Banner Resimi 4','text',$group,session()->get('locale')) !!}">

                            </div><!-- /.fancybox-icon -->
                            <div class="fancybox-item__content">
                                <h4 class="fancybox-item__title">{!! \App\Business\ThemeEditor::sectionValue('contact_banner_img4_desc','İletişm Bannerı Resim 4 Başlığı','İletişim Bannerı Resim 4 Başlığı','text',$group,session()->get('locale')) !!}</h4>
                            </div><!-- /.fancybox-content -->
                        </div><!-- /.fancybox-item -->
                    </div><!-- /.col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Banner layout 3 -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('İletişim Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('İletişim Grubu') ?>

        <!-- ==========================
        contact layout 2
    =========================== -->
        <section class="contact-layout2 pt-0 mt--120" >
            <div class="container">
                <div class="row contact-panel">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <form class="contact-panel__form" method="post"
                              action="/" id="contactForm">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="contact-panel__title">{!! \App\Business\ThemeEditor::sectionValue('contact_section_title','İletişim','İletişim Alanı Başlığı','text',$group,session()->get('locale')) !!}</h4>
                                    <p class="contact-panel__desc mb-40">{!! \App\Business\ThemeEditor::sectionValue('contact_section_desc','İletişim alanı için açıklama alanıdır. Bu alanı müşterilerinze bir mesaj vermek için kullanabilirsiniz.','İletişim Alanı Açıklaması','text',$group,session()->get('locale')) !!}</p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group"><input type="text" class="form-control"
                                                                   placeholder="{!! \App\Business\ThemeEditor::sectionValue('contact_form_name_placeholder','Adınız','İletişim Formu İsim Başlığı','text',$group,session()->get('locale')) !!}"
                                                                   id="contact_name"
                                                                   name="contact-name" required></div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group"><input type="email" class="form-control"
                                                                   placeholder="{!! \App\Business\ThemeEditor::sectionValue('contact_form_email_placeholder','E-Mail','İletişim Formu E-Mail Başlığı','text',$group,session()->get('locale')) !!}"
                                                                   id="contact_email" name="contact-email" required>
                                    </div>
                                </div><!-- /.col-lg-6 -->
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group"><input type="text" class="form-control"
                                                                   placeholder="{!! \App\Business\ThemeEditor::sectionValue('contact_form_phone_placeholder','Telefon Numaranız','Formu Telefon Başlığı','text',$group,session()->get('locale')) !!}"
                                                                   id="contact_phone"
                                                                   name="contact-phone" required></div>
                                </div><!-- /.col-lg-6 -->

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                    <textarea class="form-control"
                              placeholder="{!! \App\Business\ThemeEditor::sectionValue('contact_form_message_placeholder','Mesajınız','İletişim Formu Mesaj Alanı Başlığı','text',$group,session()->get('locale')) !!}"
                              id="contact_message"
                              name="contact_message" required></textarea>
                                    </div>
                                </div><!-- /.col-lg-12 -->
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <input type="text" name="contactPost" value="{!! route('contact.store') !!}" hidden>
                                    <div
                                        class="btn btn__secondary btn__block "  id="contact">{!! \App\Business\ThemeEditor::sectionValue('contact_form_button_text','Formu Gönder','İletişim Formu Buton Yazısı','text',$group,session()->get('locale')) !!}</div>
                                    <div id="contactFormMessage" class="btn btn-success  btn__block "></div>

                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                        </form>
                    </div><!-- /.col-lg-8 -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <div class="contact-panel__info bg-secondary">
                            <h4 class="contact-panel__info__title">{!! \App\Business\ThemeEditor::sectionValue('contact_info_title','İletişm bilgileri','İletişim Alanı Bilgiler Başlığı','text',$group,session()->get('locale')) !!}</h4>
                            <div class="contact-panel__block">
                                <h5 class="contact-panel__block__title">{!! \App\Business\ThemeEditor::sectionValue('adress_title','Adresimiz','İletişim Alanı Adres Başlığı','text',$group,session()->get('locale')) !!}</h5>
                                <ul class="contact-panel__block__list list-unstyled">
                                    <li>{!! \App\Business\ThemeEditor::sectionValue('address_content','Adres detaylı ve açıklamalı tarifi buraya yazılabilir','İletişim Alanı Adres İçeriği','text',$group,session()->get('locale')) !!}</li>
                                </ul>
                            </div><!-- /.contact-panel__info__block -->
                            <div class="contact-panel__block">
                                <h5 class="contact-panel__block__title">{!! \App\Business\ThemeEditor::sectionValue('quick_contact','Hızlı İletişim','Hızlı İletişim Başlığı','text',$group,session()->get('locale')) !!}</h5>
                                <ul class="contact-panel__block__list list-unstyled">
                                    <li>
                                        <a href="mailto:{!! site_settings('email') !!}"></a>Email: {!! \App\Business\ThemeEditor::sectionValue('email',site_settings('email'),'İletişim Alanı E-Mail','text',$group,session()->get('locale')) !!}
                                    </li>
                                    <li>
                                        <a href="tel:{!! site_settings('phone') !!}"></a>Telefon: {!! \App\Business\ThemeEditor::sectionValue('phone',site_settings('phone'),'İletişim Alanı Telefon','text',$group,session()->get('locale')) !!}
                                    </li>
                                </ul>
                            </div><!-- /.contact-panel__info__block -->
                            <div class="contact-panel__block">
                                <h5 class="contact-panel__block__title">{!! \App\Business\ThemeEditor::sectionValue('opening_hours_title','Açık Kalma Saatleri','İletişim Alanı Açık Kalma Saatleri','text',$group,session()->get('locale')) !!}</h5>
                                <ul class="contact-panel__block__list list-unstyled">
                                    <li>{!! site_settings('working_hours') !!}</li>

                                </ul>
                            </div><!-- /.contact-panel__info__block -->
                            <h5 class="contact-panel__block__title">{!! \App\Business\ThemeEditor::sectionValue('contact_information_button_on_text','Bizimle İletişime Geçin','İletişime Geç Alan Başlığı','text',$group,session()->get('locale')) !!}</h5>
                            <a href="{!! \App\Business\ThemeEditor::sectionValue('contact_information_button_link','/','İletişime Geç Buton Linki','text',$group,session()->get('locale')) !!}"
                               class="btn btn__primary btn__block">{!! \App\Business\ThemeEditor::sectionValue('contact_information_button','İletişime Geç','İletişime Geç Buton Yazısı','text',$group,session()->get('locale')) !!}</a>
                        </div><!-- /.contact-panel__info -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact layout 2 -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Müşteri Yorumları',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Müşteri Yorumları')  ?>

        <!-- =========================
      Testimonials layout 1
      =========================  -->
        <a class="testimonials testimonials-layout1 text-center pt-0" id="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="heading mb-30">
                            <h2 class="heading__subtitle">{!! \App\Business\ThemeEditor::sectionValue('faqs_title','Müşterilerimiz Ne Dediler ?','S.S.S. Alanı Başlığı','text',$group,session()->get('locale')) !!}</h2>
                        </div><!-- /.heading -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-10 offset-lg-1">
                        <div class="slider-with-navs">

                        @foreach($testimonials  as $testimonial)
                            <!-- Testimonial #1 -->
                                <div class="testimonial-item">
                                    <p class="testimonial-item__desc">{!! $testimonial->description !!}
                                    </p>
                                    <div class="testimonial-item__meta">
                                        <img src="/web/testimonials/{!! $testimonial->img_url !!}" alt="{!! $testimonial->description !!}" style="border-radius: 50px; width: 52px; margin-left: 47%; " >
                                        <h4 class="testimonial-item__meta__title">{!! $testimonial->name !!}</h4>
                                        <p class="testimonial-item__meta__desc">{!! $testimonial->sector !!}</p>
                                    </div><!-- /.testimonial-meta -->
                                </div><!-- /. testimonial-item -->
                            @endforeach


                        </div>
                        <div class="slider-nav">
                            @foreach($testimonials  as $testimonial)

                                <div class="testimonial-item__thumb">
                                    <img src="{!! asset('/web/testimonials/'.$testimonial->img_url) !!}"
                                         alt="author thumb">
                                </div><!-- /.testimonial-thumb -->
                            @endforeach


                        </div><!-- /.slcik-nav -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </a><!-- /.testimonials 1 -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Çalışma Haritası Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Çalışma Haritası Grubu')  ?>

        <!-- ======================
     Work Process
    ========================= -->
        <section class="work-process">
            <div class="bg-img"><img
                    src="{!! asset('/web/assets/'.\App\Business\ActiveTheme::active_dir().'/images/backgrounds/1.jpg') !!}"
                    alt="background"></div>
            <div class="container">
                <div class="row heading heading-layout3 mb-80">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h2 class="heading__title color-white">{!! \App\Business\ThemeEditor::sectionValue('we_works_title1','Biz Çalışıyoruz','Çalışma Alanı Başlığı','text',$group,session()->get('locale')) !!}</h2>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <h3 class="heading__title color-white">{!! \App\Business\ThemeEditor::sectionValue('we_works_title2','Biz Özenle Çalışıyoruz','Çalışma Alanı Sağ Başlığı','text',$group,session()->get('locale')) !!}</h3>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row process-items-wrapper">
                    <!-- process Item #1 -->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="process-item">
                            <div class="process-item__icon">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('we_works_img1','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','Resim 1','text',$group,session()->get('locale')) !!}">

                            </div><!-- /.process-item__icon -->
                            <h4 class="process-item__title">{!! \App\Business\ThemeEditor::sectionValue('we_works_step_title1','Adım 1 Başlık','Resim 1 Başlık','text',$group,session()->get('locale')) !!}</h4>
                            <p class="process-item__desc">{!! \App\Business\ThemeEditor::sectionValue('we_works_step1','Adım 1','Resim 1 Açıklama','text',$group,session()->get('locale')) !!}</p>
                        </div><!-- /.process-item -->
                    </div><!-- /.col-lg-3 -->
                    <!-- process Item #2 -->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="process-item">
                            <div class="process-item__icon">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('we_works_img2','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','Resim 2','text',$group,session()->get('locale')) !!}">

                            </div><!-- /.process-item__icon -->
                            <h4 class="process-item__title">{!! \App\Business\ThemeEditor::sectionValue('we_works_step_title2','Adım 2 Başlık','Resim 2 Başlık','text',$group,session()->get('locale')) !!}</h4>
                            <p class="process-item__desc">{!! \App\Business\ThemeEditor::sectionValue('we_works_step2','Adım 2','Resim 2 Açıklama','text',$group,session()->get('locale')) !!}</p>
                        </div><!-- /.process-item -->
                    </div><!-- /.col-lg-3 -->
                    <!-- process Item #3 -->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="process-item">
                            <div class="process-item__icon">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('we_works_img3','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','Resim 3','text',$group,session()->get('locale')) !!}">

                            </div><!-- /.process-item__icon -->
                            <h4 class="process-item__title">{!! \App\Business\ThemeEditor::sectionValue('we_works_step_title3','Adım 3 Başlık','Resim 3 Başlık','text',$group,session()->get('locale')) !!}</h4>
                            <p class="process-item__desc">{!! \App\Business\ThemeEditor::sectionValue('we_works_step3','Adım 3','Resim 3 Açıklama','text',$group,session()->get('locale')) !!}</p>
                        </div><!-- /.process-item -->
                    </div><!-- /.col-lg-3 -->
                    <!-- process Item #4 -->
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="process-item">
                            <div class="process-item__icon">
                                <img src="{!! \App\Business\ThemeEditor::sectionValue('we_works_img4','https://i0.wp.com/adviceal.com/teknoloji/wp-content/uploads/2019/09/code.jpg?fit=2000%2C1335&ssl=1','Resim 4','text',$group,session()->get('locale')) !!}">

                            </div><!-- /.process-item__icon -->
                            <h4 class="process-item__title">{!! \App\Business\ThemeEditor::sectionValue('we_works_step_title4','Adım 4 Başlık','Resim 4 Başlık','text',$group,session()->get('locale')) !!}</h4>
                            <p class="process-item__desc">{!! \App\Business\ThemeEditor::sectionValue('we_works_step4','Adım 4','Resim 4 Açıklama','text',$group,session()->get('locale')) !!}</p>
                        </div><!-- /.process-item -->
                    </div><!-- /.col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.Work Process -->
    @endif

    @if(\App\Business\ThemeEditor::groupSection('Blog Grubu',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Blog Grubu')  ?>

        <!-- ======================
      Blog carousel
    ========================= -->
        <section class="blog-carousel pt-0 pb-50 mt--210 z-index-2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 heading-wrapper d-flex justify-content-between mb-10">
                        <div class="heading heading-light">
                            <h2 class="heading__title">{!! \App\Business\ThemeEditor::sectionValue('blog_section_title','Bloglarımız','Bloglarımız İlk Başlık','text',$group,session()->get('locale')) !!}
                            </h2>
                        </div><!-- /.heading -->
                        <a href="{!! route('blog.index') !!}"
                           class="btn btn__white btn__bordered btn__explore">{!! \App\Business\ThemeEditor::sectionValue('blog_section_subtitle','Bloglarımız','Bloglarımız Başlığı','text',$group,session()->get('locale')) !!}</a>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="slick-carousel"
                             data-slick='{"slidesToShow": 3, "slidesToScroll": 3, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                        @if(isset($posts))
                            @foreach($posts as $blog)
                                <?php $count =0; $count++; ?>
                                @if($count < 5)
                                    <!-- Blog Item #1 -->
                                        <div class="post-item">
                                            <div class="post-item__img">
                                                <a href="{!! route('blog.show',$blog->slug) !!}">
                                                    <img src="{!! asset('/web/posts/'.$blog->post_img) !!}"
                                                         alt="{!! $blog->title !!}">
                                                </a>
                                                <div class="post-item__meta__cat">
                                                    <a href="{!! route('category.search',$blog->category_slug)  !!}">{!! $blog->category_title !!}</a>
                                                </div><!-- /.blog-meta-cat -->
                                            </div><!-- /.blog-img -->
                                            <div class="post-item__content">
                                        <span
                                            class="post-item__meta__date">{!! \App\Business\PostDatePrinter::date_print('j F Y',$blog->post_created)  !!}</span>
                                                <h4 class="post-item__title"><a
                                                        href="{!! route('blog.show',$blog->slug) !!}">{!! $blog->title !!}</a>
                                                </h4>
                                                <p class="post-item__desc">  {!! \App\Business\PostCutter::cut($blog->content ,140) !!}
                                                </p>
                                                <a href="{!! route('blog.show',$blog->slug) !!}"
                                                   class="btn btn__secondary btn__link">
                                                    <i class="icon-arrow-right1"></i>
                                                    <span>{!! \App\Business\ThemeEditor::sectionValue('read_more_button','Devamını Oku','Devamını Oku Buton Yazısı','text',$group,session()->get('locale')) !!}</span>
                                                </a>
                                            </div><!-- /.blog-content -->
                                        </div><!-- /.post-item -->
                                    @endif
                                @endforeach
                            @endif
                        </div><!-- /.carousel -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog carousel -->
    @endif

@endsection
