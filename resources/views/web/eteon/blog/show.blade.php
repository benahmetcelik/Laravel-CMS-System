@extends('web.'.\App\Business\ActiveTheme::active_dir().'.layouts.app')

@section('content')

    @if(\App\Business\ThemeEditor::groupSection('Blog İçeriği',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Blog İçeriği') ?>
    <!-- ======================
      Blog Single
    ========================= -->
    <section class="blog blog-single pt-100 pb-40">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="post-item mb-0">

                        <h1 class="post-item__title">{!! $post->title !!}</h1>
                        <div class="post-item__img">
                            <a href="#">
                                <img src="{!! asset('/web/posts/'.$post->post_img) !!}" alt="{!! $post->title !!}">
                            </a>
                        </div><!-- /.entry-img -->
                        <div class="post-item__meta d-flex align-items-center">

                            <span class="post-item__meta__date">{!! \App\Business\PostDatePrinter::date_print('j F Y',$post->post_created)  !!}</span>
                        </div><!-- /.blog-meta -->
                        <div class="post-item__content">
                            <div class="post-item__desc">
                                <p>{!! $post->content !!}</p>

                            </div><!-- /.blog-desc -->
                        </div><!-- /.entry-content -->
                    </div><!-- /.post-item -->
                    <div class="blog-share d-flex flex-wrap justify-content-between mb-30 mt-20">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://{!! $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] !!}&picture=https://{!! $_SERVER['SERVER_NAME'] !!}/web/posts/{!! $post->post_img !!}&title={!! $post->title !!}" class="btn btn__social btn__facebook">
                            <i class="fab fa-facebook-f"></i><span>{!! \App\Business\ThemeEditor::sectionValue('share_on_facebook','Facebook\'ta Paylaş','Facebook\'ta Paylaş butonu Yazısı','text',$group) !!}</span>
                        </a>
                        <a target="_blank" href="http://twitter.com/share?text={!! $post->title !!}&url=https://{!! $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] !!}&hashtags=webkedi" class="btn btn__social btn__twitter">
                            <i class="fab fa-twitter"></i><span>{!! \App\Business\ThemeEditor::sectionValue('share_on_twitter','Twitter\'da Paylaş','Twitter\'da Paylaş butonu Yazısı','text',$group) !!}</span>
                        </a>
                        <a target="_blank" href="whatsapp://send?text={!! $post->title !!}-https://{!! $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] !!}" class="btn btn__social btn__google-plus" style="background-color: #2ac845">
                            <i class="fab fa-whatsapp"></i><span>{!! \App\Business\ThemeEditor::sectionValue('share_on_whatsapp','WhatsApp\'ta Paylaş','WhatsApp\'ta Paylaş butonu Yazısı','text',$group) !!}</span>
                        </a>
                    </div><!-- /.blog-share -->




                </div><!-- /.col-lg-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog Single -->
    @endif

@endsection
