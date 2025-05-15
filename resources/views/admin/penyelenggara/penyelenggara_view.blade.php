@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Penyelenggara</h4>
                    <a href="/penyelenggara/create">
                        <button type="button" class="btn btn-primary">Add Data</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th></th>
                                    <th>Nama </th>
                                    <th>Email </th>
                                    <th>Alamat </th>
                                    <th>No HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $get)
                                    <tr>

                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <div style="width: 40px; height: 40px; overflow: hidden; border-radius: 50%;">
                                                @if ($get->logo_penyelenggara)
                                                    <img src="{{ asset($get->logo_penyelenggara) }}"
                                                        alt="Logo Penyelenggara"
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </div>
                                        </td>

                                        <td>{{ $get->nama_penyelenggara }}</td>
                                        <td>{{ $get->email_penyelenggara }}</td>
                                        <td>{{ $get->alamat_penyelenggara }}</td>
                                        <td>{{ $get->nohp_penyelenggara }}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="/penyelenggara/{{ $get->id_penyelenggara }}/edit"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fa fa-pencil"></i></a>


                                                <a href="/penyelenggara/{{ $get->id_penyelenggara }}/delete"
                                                    class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                                    data-bs-target="#basicModal{{ $get->id_penyelenggara }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>

                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="basicModal{{ $get->id_penyelenggara }}" tabindex="-1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Peringatan !!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah Anda Yakin Menghapus Data dengan Nama
                                                    <br><b>
                                                        {{ $get->nama_penyelenggara }}</b> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="/penyelenggara/{{ $get->id_penyelenggara }}/delete">
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
