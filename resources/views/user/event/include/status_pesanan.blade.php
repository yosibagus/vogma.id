<table class="w-100 table">
    <tr>
        <td>Status Pembayaran</td>
        <td>{{ ucwords($status->transaction_status) }}</td>
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