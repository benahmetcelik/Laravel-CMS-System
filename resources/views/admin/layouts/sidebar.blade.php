<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="{!! asset('/web/users/'.\Illuminate\Support\Facades\Auth::user()->img_url )!!}" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>{!! auth()->user()->name !!}
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="{!! route('admin.profile.edit') !!}"><i class="fa fa-cog"></i> Profili Düzenle</a></li>
                    <li><a href="mailto:ben4hmetcelik@gmail.com"><i class="fa fa-pencil-alt"></i> Geridönüş Gönder</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->

        <!-- begin sidebar nav -->
        <ul class="nav"><li class="nav-header">Navigation</li>

                    <!-- begin sidebar minify button -->
                    <li class="has-sub "><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->



            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-pen-nib"></i>
                    <span>İçerik <span class="label label-theme">Post</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.posts.create') !!}">Yazı Ekle <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{!! route('admin.posts.index') !!}">Yazı Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>


            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-th-list" aria-hidden="true"></i>
                    <span>Kategoriler</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.categories.create') !!}">Kategori Ekle</a></li>
                    <li><a href="{!! route('admin.categories.index') !!}">Kategori Listele</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    <span>Menüler</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.menus.create') !!}">Menü Ekle</a></li>
                    <li><a href="{!! route('admin.menus.index') !!}">Menü Listele</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-sliders-h"></i>
                    <span>Sliders</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.slider.create') !!}">Slider Ekle <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{!! route('admin.slider.index') !!}">Slider Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>


            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-images"></i>
                    <span>Galeri</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.gallery.create') !!}">Galeri Ekle <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{!! route('admin.gallery.index') !!}">Galeri Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>







            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-bell"></i>
                    <span>Hizmetler</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.service.create') !!}">Hizmet Ekle <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{!! route('admin.service.index') !!}">Hizmetleri Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>





            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-copyright"></i>
                    <span>Markalar</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.clients.create') !!}">Marka Ekle <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{!! route('admin.clients.index') !!}">Markaları Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>
            @if(\App\Business\ThemeEditor::getThemeSetting('faqs_title'))
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-comment-dots"></i>
                    <span>Müşteri Yorumları</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.testimonials.create') !!}">Müşteri Yorumu Ekle <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{!! route('admin.testimonials.index') !!}">Müşteri Yorumu Listele </a></li>
                </ul>
            </li>
            @endif
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-question"></i>
                    <span>S.S.S.</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.faqs.create') !!}">Soru Ekle <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{!! route('admin.faqs.index') !!}">Soruları Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-comment"></i>
                    <span>İletişim</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.contact.index') !!}">İletişim Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-fill-drip"></i>
                    <span>Temalar</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.theme.index') !!}">Temaları Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-language" aria-hidden="true"></i>
                    <span>Diller</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.multilang.create') !!}">Dil Ekle <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="{!! route('admin.multilang.index') !!}">Dilleri Listele <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-user-astronaut" aria-hidden="true"></i>
                    <span>Kullanıcılar</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.users.create') !!}">Kullanıcı Ekle</a></li>
                    <li><a href="{!! route('admin.users.index') !!}">Kullanıcı Listele</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-cogs"></i>
                    <span>Ayarlar</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('admin.settings.index') !!}">Site Ayarları<i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>





        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
