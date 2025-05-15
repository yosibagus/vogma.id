@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Penyelenggara</h4>
                    <a href="/finalis/create">
                        <button type="button" class="btn btn-primary">Add Finalis</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th></th>
                                    <th>No Kandidat </th>
                                    <th>Event dikuti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $get)
                                    <tr>

                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <div style="width: 40px; height: 40px; overflow: hidden; border-radius: 50%;">
                                                <img src="{{ asset('storage/' . $get->foto_kandidat) }}" alt="Foto kandidat"
                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        </td>

                                        <td>{{ $get->no_kandidat }}</td>
                                         <td>{{ $get->event->nama_event ?? '-' }}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="/finalis/{{ $get->id_kandidat }}/edit"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fa fa-pencil"></i></a>


                                                <a href="/finalis/{{ $get->id_kandidat }}/delete"
                                                    class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                                    data-bs-target="#basicModal{{ $get->id_kandidat }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>

                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="basicModal{{ $get->id_kandidat }}" tabindex="-1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Peringatan !!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah Anda Yakin Menghapus Data dengan Event yang diikuti
                                                    <b>
                                                        {{ $get->event->nama_event ?? '-' }}</b> ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="/finalis/{{ $get->id_kandidat }}/delete">
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
