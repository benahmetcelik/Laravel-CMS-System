@extends('admin.layouts.app')
@section('style')

    <!-- ================== BEGIN PAGE CSS ================== -->
    <link href="{!! asset('/backend/plugins/summernote/dist/summernote.css') !!}" rel="stylesheet"/>
    <!-- ================== END PAGE CSS ================== -->
    <!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="{!! asset('/backend/plugins/switchery/switchery.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/abpetkov-powerange/dist/powerange.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/select2/dist/css/select2.min.css') !!}" rel="stylesheet"/>
    <!-- ================== END PAGE CSS STYLE ================== -->
@endsection
@section('content')
    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
            <li class="breadcrumb-item active">Summernote</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">İçeriğinizi Paylaşın <small> Karışma olmaması için lütfen url ile oynamayın.</small>
        </h1>
        <!-- end page-header -->
        <!-- begin row -->
        <div class="row">


            <!-- begin col-10 -->
            <div class="col-xl-12">
                <!-- begin panel -->
                <div class="panel panel-inverse m-b-0">
                    <div class="panel-heading">
                        <h4 class="panel-title">{!! $group->group_title !!} grubunun elemanları</h4>
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
                    <div class="panel-body p-0">

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

                        @foreach($sections as $section)
                            @if($section->setting_group == $group->id)

                                <tr>
                                    <td class="bg-light">{!! $section->setting_title !!}</td>
                                    <td>
                                        <div class='edit'>{!! $section->setting_value !!}</div>

                                        <input type='text'  class="form-control m-b-5 txtedit" value='{!! $section->setting_value !!}' name="{!! $section->id !!}" id="title" required>
                                    </td>
                                    <td><span class="text-black-lighter">{!! $section->setting_key !!}</span></td>
                                </tr>


                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-10 -->

        </div>
        <!-- end row -->
    </div>

@endsection
@section('script')
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{!! asset('/backend/plugins/summernote/dist/summernote.min.js') !!}"></script>
    <script src="{!! asset('/backend/js/demo/form-summernote.demo.js') !!}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{!! asset('/backend/plugins/switchery/switchery.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/abpetkov-powerange/dist/powerange.min.js') !!}"></script>
    <script src="{!! asset('/backend/js/demo/form-slider-switcher.demo.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/select2/dist/js/select2.min.js') !!}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function () {


            $('.txtedit').hide();

            // Show Input element
            $('.edit').click(function () {
                $(this).hide();
                $(this).next('.txtedit').show().focus();
                $(this).hide();
            });

            // Save data
            $(".txtedit").focusout(function () {


                var id = this.name;
                var value = $(this).val();


                $(this).hide();


                $(this).prev('.edit').show();
                $(this).prev('.edit').text(value);

                // Sending AJAX request
                $.ajax({
                    url: '{!! route('admin.theme.detailsStore') !!}',
                    type: 'post',
                    data: {
                        id: id,
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
