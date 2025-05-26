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
@endif
@if ($status->transaction_status == 'settlement')
    <div class="text-center">
        <h6 class="mb-0">Terimakasih</h3>
            <small class="text-muted">Pembayaran berhasil, suara anda sudah masuk ke dalam perhitungan kandidat</small>
            <hr>
            <div class="form-group">
                <label for="" class="text-gold mb-2">Tinggalkan Pesan Anda disini :</label>
                <textarea name="pesan" id="pesan" class="form-control" autofocus rows="3" placeholder="...."></textarea>
            </div>
            <div class="mt-2 mb-1">Sembunyikan identitas Anda?</div>
            <div class="row g-3">
                <!-- Card "Ya" -->
                <div class="col-6">
                    <input type="radio" class="btn-check" name="jawaban" id="jawabanYa" value="ya"
                        autocomplete="off">
                    <label class="card p-2 text-center border rounded-3" style="cursor: pointer" for="jawabanYa" id="labelYa">
                        <span>Ya</span>
                    </label>
                </div>

                <!-- Card "Tidak" -->
                <div class="col-6">
                    <input type="radio" class="btn-check" name="jawaban" id="jawabanTidak" value="tidak"
                        autocomplete="off">
                    <label class="card p-2 text-center border rounded-3" style="cursor: pointer" for="jawabanTidak" id="labelTidak">
                        <span>Tidak</span>
                    </label>
                </div>
            </div>
            <button class="mt-3 btn btn-gold w-100">Kirim Pesan</button>
    </div>
@endif
