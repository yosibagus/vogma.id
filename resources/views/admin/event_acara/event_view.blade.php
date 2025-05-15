@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-header">
                    <h4 class="card-title">Data Event</h4>
                    <a href="/event-acara/create">
                        <button type="button" class="btn btn-primary">Add Event</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penyelenggara</th>
                                    <th>Nama Event </th>
                                    <th>Url Event </th>
                                    <th>Lokasi </th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $get)
                                    <tr>

                                        <td>{{ $no++ }}</td>
                                        <td>{{ $get->penyelenggara->nama_penyelenggara }}</td>
                                        <td>{{ $get->nama_event }}</td>
                                        <td>{{ $get->url_event }}</td>
                                        <td>{{ $get->lokasi_event }}</td>
                                        <td>Rp {{ number_format($get->harga_event, 0, ',', '.') }}</td>


                                        <td>
                                            <div class="d-flex">
                                                <a href="/event-acara/{{ $get->id_event }}/edit"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fa fa-pencil"></i></a>


                                                <a href="/event-acara/{{ $get->id_event }}/delete"
                                                    class="btn btn-danger shadow btn-xs sharp" data-bs-toggle="modal"
                                                    data-bs-target="#basicModal{{ $get->id_event }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>

                                    </tr>

                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="basicModal{{ $get->id_event }}" tabindex="-1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Peringatan !!!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">Jika anda menghapus data <strong>{{ $get->nama_event }}</strong>, Data Finalis
                                                    akan hilang juga, Apakah anda yakin ingin menghapus data ini ?<br>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="/event-acara/{{ $get->id_event }}/delete">
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
