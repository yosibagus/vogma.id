@if ($status->transaction_status == 'settlement')
    <div class="text-center">
        <img src="https://static.vecteezy.com/system/resources/previews/020/191/096/non_2x/green-checklist-icon-free-vector.jpg"
            width="100" alt="">
        <h6>Transaksi Telah Berhasil</h6>
    </div>
@elseif (
    $status->transaction_status == 'expire' ||
        $status->transaction_status == 'cancel' ||
        $status->transaction_status == 'deny')
    <div class="text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/458/458594.png" width="100" alt="">
        <h6>Transaksi Gagal</h6>
    </div>
@else
    <img src="https://api.midtrans.com/v2/qris/{{ $status->transaction_id }}/qr-code"
        style="display: block; width: 300px; height: 300px;" alt="">
@endif
