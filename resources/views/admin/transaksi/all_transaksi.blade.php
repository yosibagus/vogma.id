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
                    <h4 class="card-title">Data Semua Transaksi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display min-w850">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Voters</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Event</th>
                                    <th>Total Harga</th>
                                    <th>Total Pembayaran</th>
                                    <th>Waktu Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $get)
                                    <tr>
                                        <td>{{ $get->id_detail }}</td>
                                        <td>{{ $get->nama_voters }}</td>
                                        <td>{{ $get->nohp_voters }}</td>
                                        <td>{{ $get->email_voters }}</td>
                                        <td>{{ $get->event->nama_event ?? 'Tidak Ditemukan' }}</td>
                                        <td>{{ rupiah($get->total_harga) }}</td>
                                        <td>{{ rupiah($get->total_pembayaran) }}</td>
                                        <td>{{ tanggal($get->created_at) }}</td>
                                        <td>{{ $get->status_pembayaran ?? 'Pedding' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
