<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ViewRepository
{
    public static function view_transaksi_pemesanan_model()
    {
        $data = DB::select("
        SELECT `detail_pemesanan_model`.`id` AS `detail_pemesanan_model_id`,`pemesanan`.`tanggal` AS `tanggal`,`pemesanan`.`pelanggan_id` AS `pelanggan_id`,`pelanggan`.`nama_pelanggan` AS `nama_pelanggan`,`pemesanan`.`penjahit_id` AS `penjahit_id`,`penjahit`.`nama_penjahit` AS `nama_penjahit`,`detail_pemesanan_model`.`model_id` AS `model_id`,`model`.`nama_model` AS `nama_model`,`jenis_model`.`nama_jenismodel` AS `jenis_model`,`detail_pemesanan_model`.`banyaknya` AS `jumlah`,'PCS' AS `satuan` from (((((`pemesanan` join `pelanggan` on(`pemesanan`.`pelanggan_id` = `pelanggan`.`id`)) join `detail_pemesanan_model` on(`pemesanan`.`id` = `detail_pemesanan_model`.`pemesanan_id`)) join `penjahit` on(`pemesanan`.`penjahit_id` = `penjahit`.`id`)) join `model` on(`detail_pemesanan_model`.`model_id` = `model`.`id`)) join `jenis_model` on(`model`.`jenis_model` = `jenis_model`.`id`))
        ");
        return $data;
    }
}

