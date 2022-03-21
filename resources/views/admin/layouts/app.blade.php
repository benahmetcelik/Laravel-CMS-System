<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Color Admin | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{!! asset('backend/css/default/app.min.css" rel="stylesheet') !!}" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{!! asset('backend/plugins/jvectormap-next/jquery-jvectormap.css') !!}" rel="stylesheet" />
    <link href="{!! asset('backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') !!}" rel="stylesheet" />
    <link href="{!! asset('backend/plugins/gritter/css/jquery.gritter.css') !!}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->
    @yield('style')

</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade show">
    <span class="spinner"></span>
</div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')



    @yield('content')

    <!-- begin theme-panel -->
    <div class="theme-panel theme-panel-lg">
        <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
        <div class="theme-panel-content">
            <h5>App Settings</h5><ul class="theme-list clearfix">
                <li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="{!! asset('/backend/css/default/theme/red.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="{!! asset('/backend/css/default/theme/pink.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="{!! asset('/backend/css/default/theme/orange.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="{!! asset('/backend/css/default/theme/yellow.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="{!! asset('/backend/css/default/theme/lime.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="{!! asset('/backend/css/default/theme/green.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
                <li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="{!! asset('/backend/css/default/theme/aqua.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="{!! asset('/backend/css/default/theme/blue.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="{!! asset('/backend/css/default/theme/purple.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="{!! asset('/backend/css/default/theme/indigo.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="{!! asset('/backend/css/default/theme/black.min.css') !!}" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
            </ul>
            <div class="divider"></div>
            <div class="row m-t-10">
                <div class="col-6 control-label text-inverse f-w-600">Header Fixed</div>
                <div class="col-6 d-flex">
                    <div class="custom-control custom-switch ml-auto">
                        <input type="checkbox" class="custom-control-input" name="header-fixed" id="headerFixed" value="1" checked />
                        <label class="custom-control-label" for="headerFixed">&nbsp;</label>
                    </div>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-6 control-label text-inverse f-w-600">Header Inverse</div>
                <div class="col-6 d-flex">
                    <div class="custom-control custom-switch ml-auto">
                        <input type="checkbox" class="custom-control-input" name="header-inverse" id="headerInverse" value="1" />
                        <label class="custom-control-label" for="headerInverse">&nbsp;</label>
                    </div>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-6 control-label text-inverse f-w-600">Sidebar Fixed</div>
                <div class="col-6 d-flex">
                    <div class="custom-control custom-switch ml-auto">
                        <input type="checkbox" class="custom-control-input" name="sidebar-fixed" id="sidebarFixed" value="1" checked />
                        <label class="custom-control-label" for="sidebarFixed">&nbsp;</label>
                    </div>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-6 control-label text-inverse f-w-600">Sidebar Grid</div>
                <div class="col-6 d-flex">
                    <div class="custom-control custom-switch ml-auto">
                        <input type="checkbox" class="custom-control-input" name="sidebar-grid" id="sidebarGrid" value="1" />
                        <label class="custom-control-label" for="sidebarGrid">&nbsp;</label>
                    </div>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-6 control-label text-inverse f-w-600">Sidebar Gradient</div>
                <div class="col-md-6 d-flex">
                    <div class="custom-control custom-switch ml-auto">
                        <input type="checkbox" class="custom-control-input" name="sidebar-gradient" id="sidebarGradient" value="1" />
                        <label class="custom-control-label" for="sidebarGradient">&nbsp;</label>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <h5>Admin Design (5)</h5>
            <div class="theme-version">
                <a href="../template_html/index_v2.html" class="active">
                    <span style="background-image: url(../assets/img/theme/default.jpg);"></span>
                </a>
                <a href="../template_transparent/index_v2.html">
                    <span style="background-image: url(../assets/img/theme/transparent.jpg);"></span>
                </a>
            </div>
            <div class="theme-version">
                <a href="../template_apple/index_v2.html">
                    <span style="background-image: url(../assets/img/theme/apple.jpg);"></span>
                </a>
                <a href="../template_material/index_v2.html">
                    <span style="background-image: url(../assets/img/theme/material.jpg);"></span>
                </a>
            </div>
            <div class="theme-version">
                <a href="../template_facebook/index_v2.html">
                    <span style="background-image: url(../assets/img/theme/facebook.jpg);"></span>
                </a>
                <a href="../template_google/index_v2.html">
                    <span style="background-image: url(../assets/img/theme/google.jpg);"></span>
                </a>
            </div>
            <div class="divider"></div>
            <h5>Language Version (7)</h5>
            <div class="theme-version">
                <a href="../template_html/index_v2.html" class="active">
                    <span style="background-image: url(../assets/img/version/html.jpg);"></span>
                </a>
                <a href="../template_ajax/index_v2.html">
                    <span style="background-image: url(../assets/img/version/ajax.jpg);"></span>
                </a>
            </div>
            <div class="theme-version">
                <a href="../template_angularjs/index_v2.html">
                    <span style="background-image: url(../assets/img/version/angular1x.jpg);"></span>
                </a>
                <a href="../template_angularjs8/index_v2.html">
                    <span style="background-image: url(../assets/img/version/angular8x.jpg);"></span>
                </a>
            </div>
            <div class="theme-version">
                <a href="../template_laravel/index_v2.html">
                    <span style="background-image: url(../assets/img/version/laravel.jpg);"></span>
                </a>
                <a href="../template_vuejs/index_v2.html">
                    <span style="background-image: url(../assets/img/version/vuejs.jpg);"></span>
                </a>
            </div>
            <div class="theme-version">
                <a href="../template_reactjs/index_v2.html">
                    <span style="background-image: url(../assets/img/version/reactjs.jpg);"></span>
                </a>
            </div>
            <div class="divider"></div>
            <h5>Frontend Design (4)</h5>
            <div class="theme-version">
                <a href="../../../frontend/template/template_one_page_parallax/index.html">
                    <span style="background-image: url(../assets/img/theme/one-page-parallax.jpg);"></span>
                </a>
                <a href="../../../frontend/template/template_e_commerce/index.html">
                    <span style="background-image: url(../assets/img/theme/e-commerce.jpg);"></span>
                </a>
            </div>
            <div class="theme-version">
                <a href="../../../frontend/template/template_blog/index.html">
                    <span style="background-image: url(../assets/img/theme/blog.jpg);"></span>
                </a>
                <a href="../../../frontend/template/template_forum/index.html">
                    <span style="background-image: url(../assets/img/theme/forum.jpg);"></span>
                </a>
            </div>
            <div class="divider"></div>
            <div class="row m-t-10">
                <div class="col-md-12">
                    <a href="https://seantheme.com/color-admin/documentation/" class="btn btn-inverse btn-block btn-rounded" target="_blank"><b>Documentation</b></a>
                    <a href="javascript:;" class="btn btn-default btn-block btn-rounded" data-click="reset-local-storage"><b>Reset Local Storage</b></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end theme-panel -->

    <!-- begin scroll to top btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    <!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{!! asset('backend/js/app.min.js') !!}"></script>
<script src="{!! asset('backend/js/theme/default.min.js') !!}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{!! asset('backend/plugins/gritter/js/jquery.gritter.js') !!}"></script>
<script src="{!! asset('backend/plugins/flot/jquery.flot.js') !!}"></script>
<script src="{!! asset('backend/plugins/flot/jquery.flot.time.js') !!}"></script>
<script src="{!! asset('backend/plugins/flot/jquery.flot.resize.js') !!}"></script>
<script src="{!! asset('backend/plugins/flot/jquery.flot.pie.js') !!}"></script>
<script src="{!! asset('backend/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}"></script>
<script src="{!! asset('backend/plugins/jvectormap-next/jquery-jvectormap.min.js') !!}"></script>
<script src="{!! asset('backend/plugins/jvectormap-next/jquery-jvectormap-world-mill.js') !!}"></script>
<script src="{!! asset('backend/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') !!}"></script>
<script src="{!! asset('backend/js/demo/dashboard.js') !!}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
<script>
     function admin_respones(message,text,img) {


                $.gritter.add({
                    title: message,
                    text: text,
                    image: '/backend/img/defaults/'+img+'.gif',
                    sticky: false,
                    time: '2000',
                    class_name: 'my-sticky-class'
                });


    }

        function translate(text,target,lang){
        $.ajax({
            url:"{!! route('admin.translate.action') !!}",
            type: 'POST',
            data : {
                lang : lang,
                text : text,
                '_token' : "{!! csrf_token() !!}"
            },
            success:function (response){
                $(target).val(response);
            }

        })
    }
</script>
@yield('script')

</body>
</html>
