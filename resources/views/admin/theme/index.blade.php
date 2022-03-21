@extends('admin.layouts.app')
@section('style')
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{!! asset('/backend/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/backend/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') !!}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->
    <!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="{!! asset('/backend/plugins/switchery/switchery.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('/backend/plugins/abpetkov-powerange/dist/powerange.min.css') !!}" rel="stylesheet" />
    <!-- ================== END PAGE CSS STYLE ================== -->
@endsection

@section('content')
    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
            <li class="breadcrumb-item active">Managed Tables</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Managed Tables <small>header small text goes here...</small></h1>
        <!-- end page-header -->
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Data Table - Default</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">

                    <thead>
                    <tr>
                        <th width="1%">İD</th>
                        <th class="text-nowrap">Başlık</th>
                        <th class="text-nowrap">Aktiflik</th>
                        <th class="text-nowrap">Düzenle</th>
                    </tr>
                    </thead>
                    <tbody>

            @foreach($themes as $theme)

                    <tr class="gradeU" id="post_{!! $theme->id !!}">
                        <td class="f-s-600 text-inverse">{!! $theme->id !!}</td>
                        <td>{!! $theme->name !!}</td>


                        <td>

                            <div class="switcher switcher-success">
                                <input type="checkbox" name="status" id="status{!! $theme->id !!}" class="changeStatus" {!! ($theme->status ==  1) ? 'checked' : null !!} value="{!! $theme->status !!}" data-id="{!! $theme->id !!}" data-status="{!! $theme->status !!}">
                                <label for="status{!! $theme->id !!}"></label>
                            </div>

                        </td>
                        <td>
                            <a href="{!! route('admin.theme.editTheme', $theme->id) !!}" class="btn btn-success">Düzenle</a>
                        </td>



                    </tr>
            @endforeach

                    </tbody>

                </table>
            </div>
            <!-- end panel-body -->
            <form action="{!! route('admin.theme.findTheme') !!}" method="post">
                @csrf
            <button class="btn btn-danger btn-block">Temaları Sıfırla</button>
            </form>

        </div>
        <!-- end panel -->
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


        let changeStatusButton = '.changeStatus';

        $(document.body).on('click',changeStatusButton,function () {
            let category_changed_id =  $(this).data("id");

              console.log(category_changed_id);
            $.ajax({
                url:"{!! route('admin.theme.statusUpdate') !!}",
                type: 'POST',
                data : {
                    id : category_changed_id,
                    '_token' : "{!! csrf_token() !!}"
                },
                success:function (response){

                    $(this).prop('checked', response);
                    if (response == true){
                        admin_respones('Başarıyla Güncellendi','Tema Güncelleme İşlemi Başarılı Oldu','success');
                    }else{
                        admin_respones('Başarısız Oldu','Tema Güncelleme İşlemi Başarısız Oldu','error');
                    }
                }

            })



        })



    </script>
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{!! asset('/backend/plugins/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('/backend/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('/backend/js/demo/table-manage-default.demo.js') !!}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

@endsection
