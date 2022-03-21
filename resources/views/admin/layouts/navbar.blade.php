<!-- begin #header -->
<div id="header" class="header navbar-default">
    <!-- begin navbar-header -->
    <div class="navbar-header">
        <a href="{!! route('admin.home') !!}" class="navbar-brand"><span class="navbar-logo"></span> <b>{!! site_settings('title') !!}  </b> -Admin</a>
        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- end navbar-header --><!-- begin header-nav -->
    <ul class="navbar-nav navbar-right">


        <li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{!! asset('/web/users/'.auth()->user()->img_url )!!}" alt="" />
                <span class="d-none d-md-inline">{!! auth()->user()->name !!}</span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{!! route('admin.profile.edit') !!}" class="dropdown-item">Profilini Düzenle</a>
                <a href="{!! route('admin.contact.index') !!}" class="dropdown-item"><span class="badge badge-danger pull-right">{!! \App\Business\MinimalDetails::contact_messages_count() !!}</span> Mesajlar</a>
                <a href="{!! route('admin.settings.index') !!}" class="dropdown-item">Ayarlar</a>
                <div class="dropdown-divider"></div>
                <form action="{!! route('logout') !!}" method="post">@csrf
                    <a> <button class="dropdown-item"> Çıkış Yap</button></a>
                </form>

            </div>
        </li>
    </ul>
    <!-- end header-nav -->
</div>
<!-- end #header -->
