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

    public static function view_ukuran()
    {
        $data = DB::select("
        SELECT uk.id as id_ukuran, plg.nama_pelanggan, p.tanggal, m.nama_model, uk.ukuran_baju, uk.deskripsi_ukuran
        FROM pemesanan as p
        JOIN detail_pemesanan_model as pm ON p.id=pm.pemesanan_id
        JOIN detail_pemesanan_model_ukuran as uk ON pm.id=uk.detail_pemesanan_model_id
        JOIN pelanggan as plg ON p.pelanggan_id=plg.id
        JOIN model as m ON pm.model_id=m.id
        ");

        return $data;
    }

    public static function view_ukuran2($id)
    {
        $data = DB::table('view_ukuran')->where('id_pemesanan_model', $id)->get();

        return $data;
    }

    public static function view_tanggungan_pesanan()
    {
        $data = DB::table('view_tanggungan_pesanan')->get();

        return $data;
    }

    public static function view_pemesanan_belum_finish()
    {
        $data = DB::select("
        SELECT DISTINCT pemesanan.id as pemesanan_id,detail_pemesanan_model.id as detail_pemesanan_model_id, pemesanan.tanggal as tanggal, pemesanan.pelanggan_id, pelanggan.nama_pelanggan, pemesanan.penjahit_id, penjahit.nama_penjahit,  detail_pemesanan_model.model_id, model.nama_model, jenis_model.nama_jenismodel as jenis_model ,detail_pemesanan_model.banyaknya as jumlah, 'PCS' as satuan
        FROM pemesanan
        INNER JOIN pelanggan ON pemesanan.pelanggan_id=pelanggan.id
        INNER JOIN detail_pemesanan_model ON pemesanan.id=detail_pemesanan_model.pemesanan_id
        INNER JOIN penjahit ON pemesanan.penjahit_id=penjahit.id
        INNER JOIN model ON detail_pemesanan_model.model_id=model.id
        INNER JOIN jenis_model ON model.jenis_model=jenis_model.id
        INNER JOIN realisasi_produksi ON pemesanan.id=realisasi_produksi.pemesanan_id
        WHERE realisasi_produksi.proses_produksi_id<8
        ");

        return $data;
    }
}

