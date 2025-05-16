<?php
if (!function_exists('rupiah')) {
    function rupiah($rupiah)
    {
        return 'Rp ' . number_format($rupiah, 0, ',', '.');
    }
}

if (!function_exists('tgl')) {
    function tgl($tgl)
    {
        return date('d-m-Y', strtotime($tgl));
    }
}
