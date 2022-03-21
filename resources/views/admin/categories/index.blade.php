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
                        <th width="1%" data-orderable="false">Resim</th>
                        <th class="text-nowrap">Başlık</th>
                        <th class="text-nowrap">İçerik</th>
                        <th class="text-nowrap">Aktiflik</th>
                        <th class="text-nowrap">İşlem</th>
                    </tr>
                    </thead>
                    <tbody>

            @foreach($categories as $category)

                    <tr class="gradeU" id="category_{!! $category->id !!}">
                        <td class="f-s-600 text-inverse">{!! $category->id !!}</td>
                        <td class="with-img"><img src="{!! asset('/web/categories/'.$category->img_url) !!}" class="img-rounded height-30" alt=""/></td>
                        <td>{!! $category->title !!}</td>
                        <td>5</td>

                        <td>

                            <div class="switcher switcher-success">
                                <input type="checkbox" name="status" id="status{!! $category->id !!}" class="changeStatus" {!! ($category->status ==  1) ? 'checked' : null !!} value="{!! $category->status !!}" data-id="{!! $category->id !!}" data-status="{!! $category->status !!}">
                                <label for="status{!! $category->id !!}"></label>
                            </div>

                        </td>
                        <td>

                                <button  data-id="{!! $category->id !!}" class="btn btn-danger destroy">Sil</button>

                                <a  href="{!! route('admin.categories.edit',$category->id) !!}" class="btn btn-warning">Düzenle</a>

                        </td>

                    </tr>
            @endforeach

                    </tbody>
                </table>
            </div>
            <!-- end panel-body -->
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

        let destroyButton = '.destroy';
        $(document.body).on('click',destroyButton,function () {
            let category_id =  $(this).data("id");
          //  console.log(category_id);
            $.ajax({
                url:"{!! route('admin.categories.destroy') !!}",
                type: 'POST',
                data : {
                    id : category_id,
                    '_token' : "{!! csrf_token() !!}"
                },
                success:function (response){
                   let deleted_category_id = '#category_'+response;
                   $(deleted_category_id).hide( "slow" );
                }

            })



        })
        let changeStatusButton = '.changeStatus';

        $(document.body).on('click',changeStatusButton,function () {
            let category_changed_id =  $(this).data("id");

              console.log(category_changed_id);
            $.ajax({
                url:"{!! route('admin.categories.statusUpdate') !!}",
                type: 'POST',
                data : {
                    id : category_changed_id,
                    '_token' : "{!! csrf_token() !!}"
                },
                success:function (response){

                    $(this).prop('checked', response);

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
