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
