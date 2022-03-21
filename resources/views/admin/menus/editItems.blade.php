@extends('admin.layouts.app')
@section('style')


    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <link href="{!! asset('/backend/plugins/select2/dist/css/select2.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('/backend/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') !!}" rel="stylesheet"/>
    <!-- ================== END PAGE LEVEL JS ================== -->
@endsection
@section('content')
    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">UI Elements</a></li>
            <li class="breadcrumb-item active">Tree View</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">{!! $menu->name !!} <small> Menüsünü düzenliyorsunuz</small></h1>
        <!-- end page-header -->


        <!-- begin row -->
        <div class="row">
            <!-- begin col-6 -->
            <div class="col-xl-4">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="tree-view-3">
                    <div class="panel-heading">
                        <h4 class="panel-title">Sürekleyerek Menünüzü Oluşturun</h4>
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
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle fa-fw"></i> Değişiklikleri Kaydetmeyi Unutmayınız
                    </div>
                    <div class="panel-body">
                        <div class="panel-body">


                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Başlık</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control m-b-5" id="item_title"
                                           placeholder="Menüde Görünecek Başlığı Giriniz">
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Öncelik</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control m-b-5" id="item_priority"
                                           placeholder="Menüde Görünecek Sıra">

                                </div>
                            </div>

                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Üst İtem</label>
                                <div class="col-md-9">
                                    <select class="select2 form-control" id="parent_item" name="parent_item">
                                        <option value="">Boş Bırakmak İstiyorum</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Link</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control m-b-5" id="route" placeholder="/kategori">

                                    <small class="f-s-12 text-grey-darker">Boş bırakmak veya alt item eklemek için #
                                        bırakınız</small>
                                </div>
                            </div>
                            <div class="btn btn-primary btn-block m-b-5" id="itemToMenuAdd">
                                Menüye Ekle <i class="fa fa-angle-right"></i>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-6 -->
            <!-- begin col-6 -->
            <div class="col-xl-8">
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="tree-view-3">
                    <div class="panel-heading">
                        <h4 class="panel-title">Sürekleyerek Menünüzü Oluşturun</h4>
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
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle fa-fw"></i> Değişiklikleri Kaydetmeyi Unutmayınız
                    </div>
                    <div class="panel-body">
                        <div id="menu_items_view" class="accordion">
                            <h4 class="text-center" id="alert_empty_menu">Şu anda menüye eleman eklemediniz</h4>


                        </div>
                    </div>
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-6 -->

        </div>
        <!-- end row -->
    </div>
    <div id="modals">

    </div>
@endsection
@section('script')

    <script src="{!! asset('/backend/plugins/select2/dist/js/select2.min.js') !!}"></script>
    <script>
        function updateItem(id){
            let this_title = document.getElementById('item_title'+id).value;
            let this_priority = document.getElementById('item_priority'+id).value;
            let this_route = document.getElementById('route'+id).value;

            //update_this_item
            $.ajax({
                url: "{!! route('admin.menus.menusApi') !!}",
                type: 'POST',
                data: {
                    type: 'update_this_item',
                    id: id,
                    title : this_title,
                    priority : this_priority,
                    route : this_route,
                    menu : {!! $menu->id !!},
                    '_token': "{!! csrf_token() !!}"
                },
                success: function (response) {

                    if (response == false) {
                        admin_respones('Başarısız Oldu', 'Başarısız Oldu', 'error');


                    } else {

                        admin_respones('Başarıyla Tamamlandı','Başarıyla Güncellendi','success');


                    }

                }

            })

        }
        function editMenuItem(id){
            $.ajax({
                url: "{!! route('admin.menus.menusApi') !!}",
                type: 'POST',
                data: {
                    type: 'get_this_item_for_edit',
                    id: id,
                    '_token': "{!! csrf_token() !!}"
                },
                success: function (response) {

                    if (response == false) {
                        admin_respones('Başarısız Oldu', 'Başarısız Oldu', 'error');


                    } else {
                        //  admin_respones('Başarıyla Tamamlandı','Başarıyla Eklendi','success');


                            $('#modals').append(`
							<div class="modal fade" id="modal-edit`+response.id+`">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">İtem Düzenle</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<div class="alert alert-danger m-b-0">
												<h5><i class="fa fa-info-circle"></i> Dikkat !</h5>
												<p>Bu değişiklik geri alınamaz</p>
											</div>

                            <div class="form-group row m-b-15 p-3">
                                <label class="col-form-label col-md-3">Başlık</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control m-b-5" id="item_title`+response.id+`"
                                           placeholder="Menüde Görünecek Başlığı Giriniz" value="`+response.title+`">
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Öncelik</label>
                                <div class="col-md-9">
                                    <input type="number" class="form-control m-b-5" id="item_priority`+response.id+`"
                                           placeholder="Menüde Görünecek Sıra" value="`+response.priority+`">

                                </div>
                            </div>



                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Link</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control m-b-5" id="route`+response.id+`" placeholder="/kategori" value="`+response.route+`">

                                    <small class="f-s-12 text-grey-darker">Boş bırakmak veya alt item eklemek için #
                                        bırakınız</small>
                                </div>
                            </div>
										</div>
										<div class="modal-footer">
											<a href="javascript:;" class="btn btn-danger" data-dismiss="modal">Vazgeç</a>
											<button  class="btn btn-success" onclick="updateItem(`+response.id+`)" data-dismiss="modal">Kaydet</button>
										</div>
									</div>
								</div>
							</div>
             `);

                            $("#modal-edit"+id).modal('show');

                            //$("#parent_item").append("<option value='" + value.id + "'> " + value.title + " </option>");




                    }

                }

            })







            /*

            <td><a href="#modal-edit" class="btn btn-sm btn-danger" data-toggle="modal">Demo</a></td>


             */
        }
        function  deleteMenuItem(id){
            $.ajax({
                url: "{!! route('admin.menus.menusApi') !!}",
                type: 'POST',
                data: {
                    type: 'delete_this_item',
                    id: id,
                    '_token': "{!! csrf_token() !!}"
                },
                success: function (response) {

                    if (response == false) {
                        admin_respones('Başarısız Oldu', 'Başarısız Oldu', 'error');


                    } else {

                        admin_respones('Başarıyla Tamamlandı','Başarıyla Silindi','success');


                    }

                }

            })

        }
        $(document).ready(function () {
            $('#parent_item').select2();
           // editItem();



            function menu_generate() {

                //div idsi : #menu_items_view
                $.ajax({
                    url: "{!! route('admin.menus.menusApi') !!}",
                    type: 'POST',
                    data: {
                        type: 'get_all_items_for_menu',
                        menu: {!! $menu->id !!},
                        '_token': "{!! csrf_token() !!}"
                    },
                    success: function (response) {
                        if (response == false) {
                            admin_respones('Bir sorun oluştu', 'Menü yaratılırken bir sorun oluştu', 'error');

                        } else {
                            $('#alert_empty_menu').remove();
                            $("#menu_items_view").empty();
                            $.each(response, function (key, value) {

                                if (value.parent_item == null) {

                                    $("#menu_items_view").append(`
                                 <!-- begin card -->
                                 <div class="card bg-dark text-white">
         <div class="card-header bg-dark-darker pointer-cursor d-flex align-items-center collapsed" data-toggle="collapse" data-target="#collapseItem`+value.id+`">

<button class="btn btn-primary" onclick="editMenuItem(` + value.id + `);" style="align-content: center"><i class="fa fa-pen"></i></button>
                                   <span class="mx-auto"> ` + value.title + `</span>
<div class="btn btn-danger mx-3" onclick="deleteMenuItem(` + value.id + `);" style="align-content: center"><i class="fa fa-trash"></i></div>

                                 </div>
                                 <div id="collapseItem`+value.id+`" class="collapse" data-parent="#menu_items_view">
                                 <div class="card-body" id="itemSub` + value.id + `">



                                 </div>
                                 </div>
                                 </div>
                                 <!-- end card -->
                                `);
                                } else {

                                    $("#itemSub" + value.parent_item).append(`

                                <div class="card bg-dark text-white">
                                 <div
                                 class="card-header bg-dark-darker pointer-cursor d-flex align-items-center collapsed"
                                 data-toggle="collapse" data-target="#item` + value.id + `">

                                 <i class="fa fa-circle fa-fw text-muted mr-2 f-s-8"></i>
<button class="btn btn-primary" onclick="editMenuItem(` + value.id + `);" style="align-content: center"><i class="fa fa-pen"></i></button>
                                   <span class="mx-auto"> ` + value.title + `</span>
<div class="btn btn-danger mx-3" onclick="deleteMenuItem(` + value.id + `);" style="align-content: center"><i class="fa fa-trash"></i></div>




</div>
 <div id="collapseItem`+value.id+`" class="collapse" >
                                 <div class="card-body" id="itemSub` + value.id + `">



                                 </div>
                                 </div>
                                 </div>

                                 <!-- end card -->
                                `);


                                }

                            });
                            //admin_respones('Başarısız Oldu', 'Başarısız Oldu', 'error');
                        }

                    }

                })


            }

            function get_all_parent_items() {
                $.ajax({
                    url: "{!! route('admin.menus.menusApi') !!}",
                    type: 'POST',
                    data: {
                        type: 'get_all_items_for_select',
                        menu: {!! $menu->id !!},
                        '_token': "{!! csrf_token() !!}"
                    },
                    success: function (response) {

                        if (response == false) {
                            admin_respones('Başarısız Oldu', 'Başarısız Oldu', 'error');


                        } else {
                            //  admin_respones('Başarıyla Tamamlandı','Başarıyla Eklendi','success');

                            $.each(response, function (key, value) {
                                $("#parent_item").append("<option value='" + value.id + "'> " + value.title + " </option>");
                            });

                            menu_generate();

                        }

                    }

                })

            }

            get_all_parent_items();

            function parent_items_control() {
                $.ajax({
                    url: "{!! route('admin.menus.menusApi') !!}",
                    type: 'POST',
                    data: {
                        type: 'get_last_insert_item_for_this_menu',
                        menu: {!! $menu->id !!},
                        '_token': "{!! csrf_token() !!}"
                    },
                    success: function (response) {

                        if (response == false) {
                            admin_respones('Başarısız Oldu', 'Başarısız Oldu', 'error');


                        } else {
                            admin_respones('Başarıyla Tamamlandı', 'Başarıyla Eklendi', 'success');


                            $("#parent_item").append("<option value='" + response.id + "'> " + response.title + " </option>");


                        }

                    }

                })


            }


            //  alert("aca");
            let itemToMenuAdd = '#itemToMenuAdd';

            $(document.body).on('click', itemToMenuAdd, function () {
                let item_title = document.getElementById('item_title').value;
                let item_priority = document.getElementById('item_priority').value;
                let item_parent_item = document.getElementById('parent_item').value;
                let item_route = document.getElementById('route').value;
                // alert(item_title);
                //console.log(slider_changed_id);
                $.ajax({
                    url: "{!! route('admin.menus.itemAddToMenu') !!}",
                    type: 'POST',
                    data: {
                        title: item_title,
                        priority: item_priority,
                        parent_item: item_parent_item,
                        route: item_route,
                        menu: {!! $menu->id !!},
                        '_token': "{!! csrf_token() !!}"
                    },
                    success: function (response) {

                        $(this).prop('checked', response);
                        if (response == true) {
                            // admin_respones('Başarıyla Tamamlandı','Başarıyla Eklendi','success');
                            document.getElementById('item_title').value = ''
                            document.getElementById('item_priority').value = ''
                            document.getElementById('parent_item').value = ''
                            document.getElementById('route').value = ''
                            parent_items_control();
                            menu_generate();
                        } else {
                            admin_respones('Başarısız Oldu', 'Başarısız Oldu', 'error');
                        }

                    }

                })


            })

            $(document.body).on('click', '.btn', function (){
                menu_generate();

            });

        });



    </script>

@endsection
