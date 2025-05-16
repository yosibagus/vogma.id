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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Voters</th>
                                    <th>Nama Event</th>
                                    <th>Foto Kandidat</th>
                                    <th>Status Pembayaran</th>
                                    <th>Metode Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $get)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $get->nama_voters }}</td>
                                        <td>{{ $get->event->nama_event ?? '-' }}</td>
                                        <td>
                                            @if ($get->kandidat && $get->kandidat->foto_kandidat)
                                                <img src="{{ asset('storage/' . $get->kandidat->foto_kandidat) }}"
                                                    width="60" alt="Foto Kandidat">
                                            @else
                                                Tidak ada foto
                                            @endif
                                        </td>
                                        <td>{{ $get->metode_pembayaran }}</td>
                                        <td>{{ $get->status_pembayaran }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>

        </div>
    </div>
    </div>
@endsection
