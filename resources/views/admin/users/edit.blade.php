@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column  -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Kullanıcı Ekle </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="{!! route('admin.users.update',$user->id) !!}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row m-b-10">

                                    <label class="col-form-label col-md-3">Profil Resmi</label>

                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" name="img_url" id="exampleInputFile">
                                                <img src="{!! asset('/web/users/'.$user->img_url) !!}" class="img-thumbnail" style="width: 100px" alt="">

                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Yükle</span>
                                            </div>
                                        </div>
                                        <small class="f-s-12 text-grey-darker">Lütfen Sadece Resim Yükleyiniz.</small>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">İsim </label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="İsim Soyisim" value="{!! $user->name !!}">
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputEmail1">Twitter Kullanıcı Adı </label>
                                    <input type="text" name="ig_uname" class="form-control" id="ig_uname" placeholder="@ahmetcelik" value="{!! $user->ig_uname !!}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instagram Kullanıcı Adı </label>
                                    <input type="text" name="tt_uname" class="form-control" id="tt_uname" placeholder="@ahmetcelik" value="{!! $user->tt_uname !!}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">GitHub Linki </label>
                                    <input type="text" name="git_url" class="form-control" id="git_url" placeholder="@ahmetcelik" value="{!! $user->git_url !!}">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">YouTube Linki </label>
                                    <input type="text" name="yt_url" class="form-control" id="yt_url" placeholder="@ahmetcelik" value="{!! $user->yt_url !!}">
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-Mail</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="email@mail.com" value="{!! $user->email !!}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Şifre</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Şifre">
                                </div>

                                <button type="submit" class="btn btn-success btn-block" id="save_button">Kaydet</button>
                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->







                </div>
                <!--/.col (end) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
@section('script')
    <script>

        $('#email').on('input', function() {

            let inputVal = $(this).val();
            $('#save_button').removeAttr('disabled','disabled');

            emailControl(inputVal);

        });

        function emailControl(inputVal){

            let emails = [];
            @foreach($users as $userA)
            emails.push('{!!  ($userA->email != $user->email) ? $userA->email  : null !!}');
            @endforeach

            let size = emails.length;


            for(var i=0;i<=size;i++)
            {
                if(inputVal == emails[i]){

                    $('#save_button').attr('disabled','disabled');
                    alert('Bu E-Posta Kullanılıyor');
                }
            }



        }



    </script>
@endsection
