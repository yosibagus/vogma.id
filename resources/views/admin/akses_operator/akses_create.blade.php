@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Create Akses</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="" method="POST" enctype="multipart/form-data">
                      
                            @error('email')
                                <div class="alert alert-danger alert-dismissible fade show mt-2">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor"
                                        stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        class="me-2">
                                        <polygon
                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                        </polygon>
                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                    </svg>
                                    <strong>Error!</strong> {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror

                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Username</label>
                                    <input name="name" type="text" class="form-control"
                                        placeholder="Masukkan Username">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="Masukkan email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control"
                                        placeholder="Masukkan Password">
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
@endsection
