<?php $this->load->view('pedagang/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Detail Pemesanan</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Bruto</h6>
                                    <h6 class="font-extrabold mb-0">Rp. <?= number_format(112000, 2, ',', '.'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Netto</h6>
                                    <h6 class="font-extrabold mb-0">Rp. <?= number_format(183000, 2, ',', '.'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Rating Konsumen</h6>
                                    <h6 class="font-extrabold mb-0">4.6</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Pesanan</h6>
                                    <h6 class="font-extrabold mb-0">6 item</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url('assets/img/uploads/' . $this->session->foto); ?>" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= $this->session->userdata('nama_lengkap'); ?></h5>
                            <h6 class="text-muted mb-0">@<?= $this->session->userdata('username') ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-header">
                    <h4>Chat dengan Pembeli</h4>
                </div>
                <div class="card-content pb-4">
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/img/uploads/' . $penjualan->foto); ?>">
                        </div>
                        <div class="name ms-4">
                            <h5 class="mb-1"><?= $penjualan->nama_lengkap ?></h5>
                            <h6 class="text-muted mb-0">@<?= $penjualan->username ?></h6>
                        </div>
                    </div>
                    <div class="px-4">
                        <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                            Conversation</button>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header">
                            <h4>Data Pemesanan</h4>
                        </div>
                        <div class="card-body">
                            <!-- <a href="#" class="btn btn-success float-end">Lihat Pembayaran</a> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <table>
                                        <caption>
                                            Data Transaksi
                                        </caption>
                                        <tbody>
                                            <tr>
                                                <td>Kode Transaksi</td>
                                                <td>:</td>
                                                <td><?= $penjualan->kode_transaksi ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kurir</td>
                                                <td>:</td>
                                                <!-- <td><?= $penjualan->kurir ?></td> -->
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>Kurir</td>
                                                <td>:</td>
                                                <td><?= $penjualan->servis ?></td>
                                            </tr>
                                            <tr>
                                                <td>Ongkir</td>
                                                <td>:</td>
                                                <td>Rp.<?= number_format($penjualan->ongkir, 2, ',', '.') ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Harga</td>
                                                <td>:</td>
                                                <!-- <td>Rp.<?= number_format($penjualan->ongkir + $penjualan->sum_harga, 2, ',', '.') ?></td> -->
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>Proses</td>
                                                <td>:</td>
                                                <td>
                                                    <?php if ($penjualan->proses == 1) : ?>
                                                        Menunggu pembayaran
                                                    <?php elseif ($penjualan->proses == 2) : ?>
                                                        Menunggu konfirmasi penjual
                                                    <?php elseif ($penjualan->proses == 3) : ?>
                                                        Packing Barang
                                                    <?php elseif ($penjualan->proses == 4) : ?>
                                                        Barang dikirim
                                                    <?php elseif ($penjualan->proses == 5) : ?>
                                                        Barang diterima
                                                    <?php elseif ($penjualan->proses == 6) : ?>
                                                        Barang tidak diterima pembeli
                                                    <?php elseif ($penjualan->proses == 7) : ?>
                                                        Pemesanan dibatalkan
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Waktu Transaksi</td>
                                                <td>:</td>
                                                <td><?= date('j F Y H:i:s', strtotime($penjualan->waktu_transaksi)) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table>
                                        <caption>
                                            Data Konsumen
                                        </caption>
                                        <tbody>
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td>:</td>
                                                <td><?= $penjualan->nama_lengkap ?></td>
                                            </tr>
                                            <tr>
                                                <td>Username</td>
                                                <td>:</td>
                                                <td>@<?= $penjualan->username ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>:</td>
                                                <td><?= $penjualan->email ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Telepon</td>
                                                <td>:</td>
                                                <td><?= $penjualan->nomor_telepon ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?= $penjualan->alamat ?></td>
                                            </tr>
                                            <tr>
                                                <td>Link Maps</td>
                                                <td>:</td>
                                                <td><a href="<?= $penjualan->link_map ?>" class="btn btn-primary" target="_blank">Buka Map</a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Jumlah Pesanan</th>
                                        <th scope="col">Diskon</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_detail_penjualan as $detail_penjualan) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $detail_penjualan->nama_produk ?></td>
                                            <td><?= $detail_penjualan->jumlah ?></td>
                                            <td><?= $detail_penjualan->diskon * 100 ?>%</td>
                                            <td>Rp.<?= number_format($detail_penjualan->harga_jual, 2, ',', '.'); ?></td>
                                            <td><?= $detail_penjualan->satuan; ?></td>
                                            <td><?= $detail_penjualan->keterangan_order; ?></td>
                                            <td>
                                                <button type="button" class="badge bg-info" data-bs-toggle="modal" data-bs-target="#komplainModal<?= $detail_penjualan->id_detail_penjualan ?>">
                                                    Lihat Komplain
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tracking Produk</h4>
                        </div>
                        <div class="card-body">
                            Google Maps
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<?php foreach ($data_detail_penjualan as $detail_penjualan) : ?>
    <div class="modal fade" id="komplainModal<?= $detail_penjualan->id_detail_penjualan ?>" tabindex="-1" aria-labelledby="komplainModalLabel<?= $detail_penjualan->id_detail_penjualan ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="komplainModalLabel<?= $detail_penjualan->id_detail_penjualan ?>">Komplain konsumen</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <?= ($detail_penjualan->komplain) ?: "Tidak ada Komplain";  ?>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php $this->load->view('pedagang/layouts/footer'); ?>