@if ($status->transaction_status != 'settlement')
    {{-- <div class="card">
        <div class="card-body text-center">
            <img src="{{ asset('qris.png') }}" alt="Payment Method" width="80">
            <img src="https://api.sandbox.midtrans.com/v2/qris/{{ $status->transaction_id }}/qr-code" width="100%"
                alt="">
        </div>
    </div> --}}
    <table class="w-100 table">
        <tr>
            <td>Status Pembayaran</td>
            <td>{!! status_transaksi($status->transaction_status) !!}</td>
        </tr>
        <tr>
            <td>Waktu Transaksi</td>
            <td>{{ tanggal($status->transaction_time) }}</td>
        </tr>
        <tr>
            <td>Kardaluarsa</td>
            <td>{{ tanggal($status->expiry_time) }}</td>
        </tr>
    </table>

    <button id="btn-segarkan" class="btn btn-gold w-100 mt-3">Segarkan</button>
@else
    <div class="text-center">
        <h3>Terimakasih</h3>
        <p>Pembayaran berhasil, suara anda sudah masuk ke perhitungan</p>
    </div>
@endif
