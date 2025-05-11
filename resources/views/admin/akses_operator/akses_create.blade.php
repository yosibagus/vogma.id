@extends('admin.template.template')
@section('content_admin')


        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Create Akses</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Username</label>
                                            <input name="name" type="text" class="form-control" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" placeholder="Masukkan email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input name="password" type="password" class="form-control" placeholder="Masukkan Password">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Role</label>
                                            <select name="role" id="inputState" class="form-control default-select">
                                                <option selected>Pilih Role...</option>
                                                <option>Admin</option>
                                                <option>Penyelenggara</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/akses">
                                        <button type="button" class="btn btn-danger">kembali</button>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
