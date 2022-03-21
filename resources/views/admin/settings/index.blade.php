@extends('admin.layouts.app')
@section('style')

    <!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="{!! asset('/backend/plugins/switchery/switchery.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/abpetkov-powerange/dist/powerange.min.css') !!}" rel="stylesheet"/>
    <!-- ================== END PAGE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="{!! asset('/backend/plugins/x-editable-bs4/dist/bootstrap4-editable/css/bootstrap-editable.css') !!}"
          rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/x-editable-bs4/dist/inputs-ext/address/address.css') !!}" rel="stylesheet"/>
    <link
        href="{!! asset('/backend/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css') !!}"
        rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}"
          rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css') !!}"
          rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}"
          rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') !!}"
          rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/select2/dist/css/select2.min.css') !!}" rel="stylesheet"/>
    <!-- ================== END PAGE CSS STYLE ================== -->
    <style>
        .txtedit {
            display: none;
            width: 99%;
            height: 30px;
        }
    </style>
@endsection
@section('content')
    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
            <li class="breadcrumb-item active">X-Editable</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">X-Editable <small>header small text goes here...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-8 -->
            <div class="col-xl-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Editable</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                               data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                               data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                               data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                               data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table id="user" class="table table-condensed table-bordered">
                            <thead>
                            <tr>
                                <th width="20%">Ayar Adı</th>
                                <th>Değeri</th>
                                <th>Açıklama</th>
                            </tr>
                            </thead>
                            <tbody>


                            <tr>
                                <td class="bg-light">Başlık</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->title : 'Site Başlığı' !!}</div>

                                    <input type='text' class='txtedit' value='{!! ($settings != null) ? $settings->title : null !!}' name="title">
                                </td>
                                <td><span class="text-black-lighter">Sitenizin başlığı </span></td>
                            </tr>
                            <tr>
                                <td class="bg-light">Twitter</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->tt_uname : 'Site Twitter' !!}</div>
                                    <input type='text' class='txtedit' value='{!! ($settings != null) ? $settings->tt_uname : null !!}' name="tt_uname">
                                </td>
                                <td><span class="text-black-lighter">Sitenizin twitter kullanıcı adı. |kullanici| şeklinde olması gerekmektedir. </span></td>
                            </tr>
                            <tr>
                                <td class="bg-light">Instagram</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->ig_uname : 'Site Instagram' !!}</div>
                                    <input type='text' class='txtedit' value='{!! ($settings != null) ? $settings->ig_uname : null !!}' name="ig_uname">
                                </td>
                                <td><span class="text-black-lighter">Sitenizin instagram kullanıcı adı. |kullanici| şeklinde olması gerekmektedir. </span></td>
                            </tr>
                            <tr>
                                <td class="bg-light">YouTube</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->yt_url : 'Site YouTube Url' !!}</div>
                                    <input type='text' class='txtedit' value='{!! ($settings != null) ? $settings->yt_url : null !!}' name="yt_url">
                                </td>
                                <td><span class="text-black-lighter">Sitenizin YouTube linki veya kanal adı. link şeklinde olması gerekmektedir. </span></td>
                            </tr>
                            <tr>
                                <td class="bg-light">GitHub</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->git_url : 'Site GitUrl' !!}</div>
                                    <input type='text' class='txtedit' value='{!! ($settings != null) ? $settings->git_url : null !!}' name="git_url">
                                </td>
                                <td><span class="text-black-lighter">Sitenizin GitHub linki veya kanal adı. link şeklinde olması gerekmektedir. </span></td>
                            </tr>
                            <tr>
                                <td class="bg-light">E-Mail</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->email : 'Site Email' !!}</div>
                                    <input type='text' class='txtedit' value='{!! ($settings != null) ? $settings->email : null !!}' name="email">
                                </td>
                                <td><span class="text-black-lighter">Sitenizin GitHub linki veya kanal adı. link şeklinde olması gerekmektedir. </span></td>
                            </tr>
                            <tr>
                                <td class="bg-light">Telefon Numarası</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->phone : 'Site Telefon' !!}</div>
                                    <input type='text' class='txtedit' value='{!! ($settings != null) ? $settings->phone : null !!}' name="phone">
                                </td>
                                <td><span class="text-black-lighter">Sitenizin GitHub linki veya kanal adı. link şeklinde olması gerekmektedir. </span></td>
                            </tr>
                            <tr>
                                <td class="bg-light">Adres</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->address : 'Site Adresi' !!}</div>
                                    <textarea type='text' class='txtedit' name="address">{!! ($settings != null) ? $settings->address : null !!}</textarea>
                                </td>
                                <td><span class="text-black-lighter">Sitenizin GitHub linki veya kanal adı. link şeklinde olması gerekmektedir. </span></td>
                            </tr>
                            <tr>
                                <td class="bg-light">Çalışma Saatleri</td>
                                <td>
                                    <div class='edit'>->{!! ($settings != null) ? $settings->working_hours : 'Site Çalışma Saatleri' !!}</div>
                                    <input type='text' class='txtedit' value="{!! ($settings != null) ? 'diğer' : 'denem' !!}" name="working_hours">
                                </td>
                                <td><span class="text-black-lighter">Sitenizin GitHub linki veya kanal adı. link şeklinde olması gerekmektedir. </span></td>
                            </tr>

                            <tr>
                                <td class="bg-light">Logonuz</td>
                                <form action="{!! route('admin.settings.logo_update') !!}" method="post" enctype="multipart/form-data">
                                @csrf
                                <td>
                                    <div class='edit'><img src="{!! asset('/web/site_general/'. ($settings != null ? $settings->logo_url : null) ) !!}" alt="" class="img-thumbnail" style="width: 150px"></div>
                                    <input type='file' class='form-control-file txtedit'  name="logo_url">
                                </td>
                                <td><span class="text-black-lighter"><button class="btn btn-danger">Logoyu Değiştir</button> </span></td>
                                </form>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-8 -->

        </div>
        <!-- end row -->
    </div>
    <!-- end #content -->
@endsection
@section('script')



    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{!! asset('/backend/plugins/switchery/switchery.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/abpetkov-powerange/dist/powerange.min.js') !!}"></script>
    <script src="{!! asset('/backend/js/demo/form-slider-switcher.demo.js') !!}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function () {

            // Show Input element
            $('.edit').click(function () {
                $('.txtedit').hide();
                $(this).next('.txtedit').show().focus();
                $(this).hide();
            });

            // Save data
            $(".txtedit").focusout(function () {


                var field_name = this.name;
                var value = $(this).val();


                $(this).hide();


                $(this).prev('.edit').show();
                $(this).prev('.edit').text(value);

                // Sending AJAX request
                $.ajax({
                    url: '{!! route('admin.settings.update') !!}',
                    type: 'post',
                    data: {
                        column: field_name,
                        value: value,
                        '_token': "{!! csrf_token() !!}"
                    },
                    success: function (response) {

                        if (response == true) {
                            admin_respones('Başarıyla Güncellendi', 'Post Güncelleme İşlemi Başarılı Oldu', 'success');
                        } else {
                            admin_respones('Başarısız Oldu', 'Post Güncelleme İşlemi Başarısız Oldu', 'error');
                        }
                    }
                });

            });

        });
    </script>

@endsection
