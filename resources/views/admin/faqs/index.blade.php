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
                        <th width="1%">??D</th>
                        <th class="text-nowrap">Ba??l??k</th>
                        <th class="text-nowrap">Aktiflik</th>
                    </tr>
                    </thead>
                    <tbody>

            @foreach($faqs as $client)

                    <tr class="gradeU" id="post_{!! $client->id !!}">
                        <td class="f-s-600 text-inverse">{!! $client->id !!}</td>
                        <td><a href="{!! route('admin.faqs.edit',$client->id) !!}">{!! $client->title !!} - <small>D??zenlemek i??in t??klay??n??z</small></a></td>
                        <td>
                            <div class="switcher switcher-success">
                                <input type="checkbox" name="status" id="status{!! $client->id !!}" class="changeStatus" {!! ($client->status ==  1) ? 'checked' : null !!} value="{!! $client->status !!}" data-id="{!! $client->id !!}" data-status="{!! $client->status !!}">
                                <label for="status{!! $client->id !!}"></label>
                            </div>
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



        let changeStatusButton = '.changeStatus';

        $(document.body).on('click',changeStatusButton,function () {
            let slider_changed_id =  $(this).data("id");

              console.log(slider_changed_id);
            $.ajax({
                url:"{!! route('admin.faqs.statusUpdate') !!}",
                type: 'POST',
                data : {
                    id : slider_changed_id,
                    '_token' : "{!! csrf_token() !!}"
                },
                success:function (response){

                    $(this).prop('checked', response);
                    if (response == true){
                        admin_respones('Ba??ar??yla G??ncellendi','Marka G??ncelleme ????lemi Ba??ar??l?? Oldu','success');
                    }else{
                        admin_respones('Ba??ar??s??z Oldu','Marka G??ncelleme ????lemi Ba??ar??s??z Oldu','error');
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
