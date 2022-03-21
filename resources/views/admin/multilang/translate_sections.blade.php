@extends('admin.layouts.app')
@section('style')


    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{!! asset('/backend/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') !!}"
          rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') !!}"
          rel="stylesheet"/>
    <!-- ================== END PAGE LEVEL STYLE ================== -->
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


                        <table id="data-table-default"
                               class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                            <tr>
                                <th class="text-nowrap">Key</th>
                                <th class="text-nowrap">Default</th>
                                <th class="text-nowrap">{!! $lang_name !!}</th>
                                <th class="text-nowrap">Kayıt Et</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($language_translate as $section)


                                <tr class="gradeU">
                                    <td>{!! $section->section_key !!}</td>
                                    <td>
                                        <input type='text' class="form-control m-b-5 txtedit"
                                               value='{!! $section->translate !!}' name="text_{!! $section->id !!}" disabled required>

                                    </td>

                                    <td>
                                        <input type='text' class="form-control m-b-5 txtedit"
                                               value='{!! $section->translate !!}' name="section_{!! $section->id !!}"
                                               id="title" required>
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-block save" data-id="{!! $section->id !!}">
                                            Kayıt Et
                                        </button>
                                    </td>
                                </tr>



                            @endforeach
                            </tbody>
                        </table>

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
    <script src="{!! asset('/backend/plugins/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script
        src="{!! asset('/backend/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') !!}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function () {

            let button = $('.save');

            button.click(function (event) {
                let id = $(this).data('id');
                let value = $('input[name=section_'+id+']').val();


                if (value == "") {
                  alert('please not null value input');

                }else{
                    $.ajax({
                        url: "{!! route('admin.multilang.save_one_translate') !!}",
                        type: 'POST',
                        data: {
                            id: id,
                            value: value,
                            _token: "{!! @csrf_token() !!}"
                        },
                        success: function (response) {

                            if (response == true) {


                                admin_respones('Başarıyla Güncellendi','Metin Güncelleme İşlemi Başarılı Oldu','success');



                            } else {

                                admin_respones('Başarısız Oldu','Metin Güncelleme İşlemi Başarısız Oldu','error');


                            }
                        }

                    })


                }


            })

        });
    </script>
@endsection
