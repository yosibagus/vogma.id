@extends('admin.template.template')
@section('content_admin')
    <style>
        #myTable tr:hover {
            background: rgba(206, 185, 0, 0.274);
            cursor: pointer;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $event->nama_event }}</h4>
                    <a href="{{ url('event') }}" class="btn btn-sm btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card avtivity-card">
                <div class="card-body py-2">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="fs-14 mb-2">Total Pendapatan</p>
                            <span class="title text-black font-w600">{{ rupiah($total) }}</span>
                        </div>
                    </div>
                    <div class="progress" style="height:3px;">
                        <div class="progress-bar bg-warning" style="width: 100%; height:2px;" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">0% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="effect bg-warning" style="top: 469px; left: 321.25px;"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card avtivity-card">
                <div class="card-body py-2">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="fs-14 mb-2">Total Voters</p>
                            <span class="title text-black font-w600">{{ $total_voters }}</span>
                        </div>
                    </div>
                    <div class="progress" style="height:3px;">
                        <div class="progress-bar bg-success" style="width: 100%; height:2px;" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">0% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="effect bg-success" style="top: 469px; left: 321.25px;"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card avtivity-card">
                <div class="card-body py-2">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <p class="fs-14 mb-2">Total Vote</p>
                            <span class="title text-black font-w600">{{ $total_vote }}</span>
                        </div>
                    </div>
                    <div class="progress" style="height:3px;">
                        <div class="progress-bar bg-primary" style="width: 100%; height:2px;" role="progressbar"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">0% Complete</span>
                        </div>
                    </div>
                </div>
                <div class="effect bg-primary" style="top: 469px; left: 321.25px;"></div>
            </div>
        </div>
    </div>

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
                        <table id="myTable" class="table table-hover display min-w850">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Voter</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Event</th>
                                    <th>Total Harga</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $get)
                                    <tr class="row-vote" data-id="{{ $get->token_vote }}" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail">

                                        <td>{{ $get->id_detail }}</td>
                                        <td>#{{ strtoupper($get->token_vote) }}</td>
                                        <td>{{ $get->nama_voters }}</td>
                                        <td>{{ $get->nohp_voters }}</td>
                                        <td>{{ $get->email_voters }}</td>
                                        <td>{{ tanggal($get->created_at) }}</td>
                                        <td>{{ rupiah($get->total_harga) }}</td>
                                        <td>{!! status($get->status_pembayaran) !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailLabel">Detail Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBodyContent">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Pastikan jQuery & Bootstrap JS sudah ter-load di template utama -->
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable dengan order default kolom 0 descending
            let table = new DataTable('#myTable', {
                order: [
                    [0, 'desc']
                ]
            });

            // Event click baris dengan class row-vote
            $('.row-vote').on('click', function() {
                var token = $(this).data('id');
                var nama = $(this).find('td').eq(2).text();
                var nohp = $(this).find('td').eq(3).text();
                var email = $(this).find('td').eq(4).text();
                var eventTanggal = $(this).find('td').eq(5).text();
                var totalHarga = $(this).find('td').eq(6).text();

                // Isi modal dengan data dari baris yang diklik
                $('#modalBodyContent').html(
                    `<p><strong>Token Vote:</strong> ${token}</p>
                     <p><strong>Nama Voter:</strong> ${nama}</p>
                     <p><strong>No HP:</strong> ${nohp}</p>
                     <p><strong>Email:</strong> ${email}</p>
                     <p><strong>Event (Tanggal):</strong> ${eventTanggal}</p>
                     <p><strong>Total Harga:</strong> ${totalHarga}</p>`
                );
            });
        });
    </script>
@endsection
