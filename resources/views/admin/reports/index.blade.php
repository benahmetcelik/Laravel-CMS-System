@extends('admin.layouts.app')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{!! asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">
    <style>
        .qrcode{
            width: 50px;
        }
        .qrcode img{
            width: 50px;

        }
    </style>
@endsection
@section('content')

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{!! count($products) !!}</h3>

                        <p>Kayıtlı Ürün</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{!! route('admin.products.index') !!}" class="small-box-footer">Detaylar <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{!! count($categories) !!}</h3>

                        <p>Kayıtlı Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{!! route('admin.categories.index') !!}" class="small-box-footer">Detaylar <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{!! count($options) !!}</h3>

                        <p>Opsiyon</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a  class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Menü Ziyareti</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Detaylar <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->




        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable ui-sortable">


                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">Tüm Ürünler</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="productsTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Fiyat</th>
                                <th>İşlem</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>@if ($product->tr_title != null )  {!! $product->tr_title  !!} @else Türkçe Başlık Yok  @endif</td>
                                    <td>{!! $product->tr_price !!}</td>
                                    <td> <a href="{!!  route('admin.products.edit',$product->id) !!}" class="btn btn-block btn-warning"> <i class="fas fa-pen"></i></a></td>

                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Başlık</th>
                                <th>Fiyat</th>
                                <th>İşlem</th>


                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                            <div class="input-group">

                            </div>

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->


                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">QR Kodlarınız</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="productsTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>QR Kod</th>
                                <th>İşlem</th>


                            </tr>
                            </thead>
                            <tbody>


                            <tr>
                                    <td>
                                        <div class="qrcode">
                                            <img id="qr-code-img-2">
                                        </div>

                                    </td>
                                    <td>
                                        <a id="qrcode-dwnld-btn-2" class="btn btn-block btn-success"> <i class="fas fa-download"></i></a>
                                    </td>

                            </tr>


                            <tr>
                                <td>
                                    <div class="qrcode">
                                        <img id="qr-code-img-3">
                                    </div>

                                </td>
                                <td>
                                    <a id="qrcode-dwnld-btn-3" class="btn btn-block btn-success"> <i class="fas fa-download"></i></a>
                                </td>

                            </tr>


                            <tr>
                                <td>
                                    <div class="qrcode">
                                        <img id="qr-code-img-4">
                                    </div>

                                </td>
                                <td>
                                    <a id="qrcode-dwnld-btn-4" class="btn btn-block btn-success"> <i class="fas fa-download"></i></a>
                                </td>

                            </tr>




                            <tr>
                                <td>
                                    <div class="qrcode">
                                        <img id="qr-code-img-5">
                                    </div>

                                </td>
                                <td>
                                    <a id="qrcode-dwnld-btn-5" class="btn btn-block btn-success"> <i class="fas fa-download"></i></a>
                                </td>

                            </tr>


                            <tr>
                                <td>
                                    <div class="qrcode">
                                        <img id="qr-code-img-6">
                                    </div>

                                </td>
                                <td>
                                    <a id="qrcode-dwnld-btn-6" class="btn btn-block btn-success"> <i class="fas fa-download"></i></a>
                                </td>

                            </tr>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>QR Kod</th>
                                <th>İşlem</th>

                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <div class="input-group">

                        </div>

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable ui-sortable">

                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">Tüm Kategoriler</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="categoriesTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlem</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{!! $category->tr_title  !!}</td>
                                    <td>{!! $category->created_at !!}</td>
                                    <td> <a href="{!!  route('admin.categories.edit',$category->id) !!}" class="btn btn-block btn-warning"> <i class="fas fa-pen"></i></a></td>

                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Başlık</th>
                                <th>Eklenme Tarihi</th>
                                <th>İşlem</th>


                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                        <div class="input-group">

                        </div>

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
    </div>

@endsection
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{!! asset('backend/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/jszip/jszip.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/pdfmake/pdfmake.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/pdfmake/vfs_fonts.js') !!}"></script>
    <script src="{!! asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') !!}"></script>
    <script src="{!! asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}"></script>
    <script>
        @if($company_domain->company_subdomain != null)




          let params2 = {
            data: '{!! $company_domain->company_subdomain.'.'.$_SERVER['SERVER_NAME'] !!}',
            size: '500x500'

        };
        let params3 = {
            data: '{!! $company_domain->company_subdomain.'.'.$_SERVER['SERVER_NAME'] !!}',
            size: '500x500',
            bgcolor: 'f00',
            color: 'fff'

        };
        let params4 = {
            data: '{!! $company_domain->company_subdomain.'.'.$_SERVER['SERVER_NAME'] !!}',
            size: '500x500',
            bgcolor: '00fc54',
            color: 'fff'

        };


        let params5 = {
            data: '{!! $company_domain->company_subdomain.'.'.$_SERVER['SERVER_NAME'] !!}',
            size: '500x500',
            bgcolor: 'e900fa',
            color: 'fff'

        };
        let params6 = {
            data: '{!! $company_domain->company_subdomain.'.'.$_SERVER['SERVER_NAME'] !!}',
            size: '500x500',
            bgcolor: 'fff',
            color: '023af2'

        };
             $('#qr-code-img-2').attr("src",'https://api.qrserver.com/v1/create-qr-code/?'+$.param(params2));
             $('#qrcode-dwnld-btn-2').click(function() {
                 var qrCodeBaseUri = 'https://api.qrserver.com/v1/create-qr-code/?';
                 window.location.href = qrCodeBaseUri + $.param(params2)+'&margin=0&download=1';
             });

             $('#qr-code-img-3').attr("src",'https://api.qrserver.com/v1/create-qr-code/?'+$.param(params3));
             $('#qrcode-dwnld-btn-3').click(function() {
             var qrCodeBaseUri = 'https://api.qrserver.com/v1/create-qr-code/?';
             window.location.href = qrCodeBaseUri + $.param(params3)+'&margin=0&download=1';
             });
        $('#qr-code-img-4').attr("src",'https://api.qrserver.com/v1/create-qr-code/?'+$.param(params4));
        $('#qrcode-dwnld-btn-4').click(function() {
            var qrCodeBaseUri = 'https://api.qrserver.com/v1/create-qr-code/?';
            window.location.href = qrCodeBaseUri + $.param(params4)+'&margin=0&download=1';
        });
        $('#qr-code-img-5').attr("src",'https://api.qrserver.com/v1/create-qr-code/?'+$.param(params5));
        $('#qrcode-dwnld-btn-5').click(function() {
            var qrCodeBaseUri = 'https://api.qrserver.com/v1/create-qr-code/?';
            window.location.href = qrCodeBaseUri + $.param(params5)+'&margin=0&download=1';
        });
        $('#qr-code-img-6').attr("src",'https://api.qrserver.com/v1/create-qr-code/?'+$.param(params6));
        $('#qrcode-dwnld-btn-6').click(function() {
            var qrCodeBaseUri = 'https://api.qrserver.com/v1/create-qr-code/?';
            window.location.href = qrCodeBaseUri + $.param(params6)+'&margin=0&download=1';
        });


             @endif

        $(function () {





            $("#productsTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": true,
                "buttons": ["copy", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#productsTable_wrapper .col-md-6:eq(0)');


            $("#categoriesTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": true,
                "buttons": ["copy",  "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#categoriesTable_wrapper .col-md-6:eq(0)');



        });
    </script>
@endsection
