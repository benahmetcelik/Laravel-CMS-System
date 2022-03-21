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
                <table id="data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="1%">İD</th>
                        <th width="1%" data-orderable="false">Resim</th>
                        <th class="text-nowrap">Başlık</th>
                        <th class="text-nowrap">Kategori</th>
                        <th class="text-nowrap">Okunma</th>
                        <th class="text-nowrap">Aktiflik</th>
                        <th class="text-nowrap">İşlem</th>
                    </tr>
                    </thead>
                    <tbody>

            @foreach($posts as $post)

                    <tr class="" id="post_{!! $post->id !!}">
                        <td class="f-s-600 text-inverse">{!! $post->id !!}</td>
                        <td class="with-img"><img src="{!! asset('/web/posts/'.$post->img_url) !!}" class="img-rounded height-30" alt=""/></td>
                        <td>{!! $post->title !!}</td>
                        @foreach($categories as $category)
                        {!!  ($category->id == $post->category_id) ?'<td>'.$category->title.'</td>' : null !!}
                        @endforeach
                        <td>{!! $post->total_view !!}</td>

                        <td>

                            <div class="switcher switcher-success">
                                <input type="checkbox" name="status" id="status{!! $post->id !!}" class="changeStatus" {!! ($post->status ==  1) ? 'checked' : null !!} value="{!! $post->status !!}" data-id="{!! $post->id !!}" data-status="{!! $post->status !!}">
                                <label for="status{!! $post->id !!}"></label>
                            </div>

                        </td>
                        <td>

                                <button  data-id="{!! $post->id !!}"  class="btn btn-danger destroy"><i class="fa fa-trash"></i></button>

                                <a  href="{!! route('admin.posts.edit',$post->id) !!}" class="btn btn-warning">Düzenle</a>
                                <a  href="{!! route('blog.index',$post->id) !!}" class="btn btn-primary">Görüntüle</a>

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
                url:"{!! route('admin.posts.destroy') !!}",
                type: 'POST',
                data : {
                    id : category_id,
                    '_token' : "{!! csrf_token() !!}"
                },
                success:function (response){

                    let deleted_category_id = '#post_'+response;
                    $(deleted_category_id).hide( "slow" );
                    $( "tr:first-child" ).hide('slow');
                    if (response == 0){
                        admin_respones('Başarısız Oldu','Post Silme İşlemi Başarısız Oldu','error');

                    }else{
                        admin_respones('Başarıyla Silindi','Post Silme İşlemi Başarılı Oldu','success');

                    }
                }

            })



        })

        let changeStatusButton = '.changeStatus';

        $(document.body).on('click',changeStatusButton,function () {
            let category_changed_id =  $(this).data("id");

              console.log(category_changed_id);
            $.ajax({
                url:"{!! route('admin.posts.statusUpdate') !!}",
                type: 'POST',
                data : {
                    id : category_changed_id,
                    '_token' : "{!! csrf_token() !!}"
                },
                success:function (response){

                    $(this).prop('checked', response);
                    if (response == true){
                        admin_respones('Başarıyla Güncellendi','Post Güncelleme İşlemi Başarılı Oldu','success');
                    }else{
                        admin_respones('Başarısız Oldu','Post Güncelleme İşlemi Başarısız Oldu','error');
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
