@extends('web.'.active_theme_dir().'.layouts.app')

@section('content')

    @if(\App\Business\ThemeEditor::groupSection('Blog Sayfası',1) >0)
        <?php $group = \App\Business\ThemeEditor::getGroupId('Blog Sayfası') ?>
    <!-- ========================
       page title
    =========================== -->
    <section class="page-title page-title-layout8 bg-overlay bg-parallax text-center">
        <div class="bg-img"><img src="@if(isset($category_img)){!! asset('/web/categories/'.$category_img) !!}@else{!! \App\Business\ThemeEditor::sectionValue('blog_page_bg_image','https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg','Blog Sayfası Arkaplanı','text',$group) !!}@endif" alt="background"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
                    <h1 class="pagetitle__heading">@if(isset($category))  {!! $category !!}  @endif {!! \App\Business\ThemeEditor::sectionValue('blog_page_title','Bloglarımız','Blog Sayfası Başlığı','text',$group) !!}</h1>
                    <nav>
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="/">{!! \App\Business\ThemeEditor::sectionValue('blog_title_homepage_line','Anasayfa','Anasayfa Yazısı','text',$group) !!}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@if(isset($category))  {!! $category !!}  @endif {!! \App\Business\ThemeEditor::sectionValue('blog_page_title','Bloglarımız','Blog Sayfası Başlığı','text',$group) !!}</li>
                        </ol>
                    </nav>
                </div><!-- /.col-xl-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ======================
      Blog Grid
    ========================= -->
    <section class="blog-grid">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="post-item">
                        <div class="post-item__img">
                            <a href="{!! route('blog.show',$post->slug) !!}">
                                <img src="{!! asset('/web/posts/'.$post->post_img) !!}" alt="blog image">
                            </a>
                            <div class="post-item__meta__cat">
                                <a href="{!! route('category.search',$post->category_slug)  !!}">{!! $post->category_title !!}</a>
                            </div><!-- /.blog-meta-cat -->
                        </div><!-- /.blog-img -->
                        <div class="post-item__content">
                            <span class="post-item__meta__date">{!! \App\Business\PostDatePrinter::date_print('j F Y',$post->post_created)  !!}</span>
                            <h4 class="post-item__title"><a href="{!! route('blog.show',$post->slug) !!}">{!! $post->title !!}</a>
                            </h4>
                            <p class="post-item__desc">{!! \App\Business\PostCutter::cut($post->content ,140) !!}
                            </p>
                            <a href="{!! route('blog.show',$post->slug) !!}" class="btn btn__secondary btn__link">
                                <i class="icon-arrow-right1"></i>
                                <span>{!! \App\Business\ThemeEditor::sectionValue('read_more_button_for_blog_page','Devamını Oku','Devamını Oku Buton Yazısı','text',$group) !!}</span>
                            </a>
                        </div><!-- /.blog-content -->
                    </div><!-- /.post-item -->
                </div><!-- /.col-lg-4 -->

                    @endforeach
            </div><!-- /.row -->



            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <nav class="pagination-area">
                        <ul class="pagination justify-content-center">

                            {!!  $posts->links(); !!}

                        </ul>
                    </nav><!-- .pagination-area -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.blog Grid -->
    @endif
@endsection
