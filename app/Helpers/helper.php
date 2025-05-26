<?php
if (!function_exists('rupiah')) {
    function rupiah($rupiah)
    {
        return 'IDR ' . number_format($rupiah, 0, ',', '.');
    }
}

if (!function_exists('tanggal')) {
    function tanggal($tgl)
    {
        return date('d-m-Y, H:i', strtotime($tgl));
    }
}

if (!function_exists('status_transaksi')) {
    function status_transaksi($status)
    {
        switch ($status) {
            case 'settlement':
                $label = 'Berhasil';
                $class = 'badge bg-success';
                break;
            case 'pending':
                $label = 'Menunggu Pembayaran';
                $class = 'badge bg-warning text-dark';
                break;
            case 'deny':
            case 'cancel':
            case 'expire':
                $label = 'Gagal';
                $class = 'badge bg-danger';
                break;
            case 'refund':
                $label = 'Dikembalikan';
                $class = 'badge bg-info text-dark';
                break;
            default:
                $label = ucfirst($status);
                $class = 'badge bg-secondary';
                break;
        }

        return '<span class="' . $class . '">' . $label . '</span>';
    }
}


if (!function_exists('status')) {
    function status($status)
    {
        switch ($status) {
            case 'success':
                $label = 'Success';
                $class = 'badge bg-success';
                break;
            case 'pending':
                $label = 'Pending';
                $class = 'badge bg-warning text-dark';
                break;
            case 'failed':
                $label = 'Failed';
                $class = 'badge bg-danger';
                break;
            default:
                $label = 'Pending';
                $class = 'badge bg-secondary';
                break;
        }

        return '<small class="' . $class . '"><small>' . $label . '</small></small>';
    }
}
