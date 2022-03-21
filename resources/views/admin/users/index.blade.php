@extends('admin.layouts.app')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{!! asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">

@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kullanıcılar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Kullacıcılar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- .card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bütün Kullanıcılar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>İsim</th>
                                    <th>E-Posta</th>

                                    <th>Sil</th>
                                    <th>Düzenle</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                 <td>{!! $user->name !!}</td>
                                 <td>{!! $user->email !!}</td>

                                    <td> <form action="{!! route('admin.users.destroy',$user->id) !!}" method="post" >@csrf <button  class="btn btn-block btn-danger"><i class="fas fa-trash"></i></button> </form></td>
                                    <td> <a href="{!!  route('admin.users.edit',$user->id) !!}" class="btn btn-block btn-warning"> <i class="fas fa-pen"></i></a></td>

                                </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>İsim</th>
                                    <th>E-Posta</th>

                                    <th>Sil</th>
                                    <th>Düzenle</th>


                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


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
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
