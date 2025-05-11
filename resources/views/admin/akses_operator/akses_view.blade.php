@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Akses</h4>
                    <a href="/akses/create">
                        <button type="button" class="btn btn-primary">Add Users</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akun as $get)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $get->name }}</td>
                                        <td>{{ $get->email }}</td>
                                        <td>{{ $get->role }}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="/akses/{{ $get->id }}/edit"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fa fa-pencil"></i></a>


                                                <a href="/akses/{{ $get->id }}/delete"
                                                    class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                                    data-bs-target="#basicModal{{ $get->id }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>

                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="basicModal{{ $get->id }}" tabindex="-1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Peringatan !!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah Anda Yakin Menghapus Akun
                                                    <br><b>
                                                        {{ $get->name }}</b> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="/judul/{{ $get->nim }}/delete">
                                                        <button type="button"
                                                            class="btn btn-primary light">Delete</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
