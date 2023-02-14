<?php $this->load->view('pedagang/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Data Pemesanan</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pemesanan / Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <table class="table table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Kode Transaksi</th>
                                        <th scope="col">Nama Konsumen</th>
                                        <!-- <th scope="col">Kurir</th> -->
                                        <!-- <th scope="col">Servis</th> -->
                                        <!-- <th scope="col">Ongkir</th> -->
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Proses</th>
                                        <th scope="col">Waktu Transaksi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_penjualan as $penjualan) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $penjualan->kode_transaksi ?></td>
                                            <td><?= $penjualan->nama_lengkap ?></td>
                                            <!-- <td><?= $penjualan->nama_kurir ?></td> -->
                                            <!-- <td><?= $penjualan->servis ?></td> -->
                                            <!-- <td><?= $penjualan->ongkir ?></td> -->
                                            <td><?= $penjualan->keterangan ?></td>
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
                                            <td><?= date('j F Y H:i:s', strtotime($penjualan->waktu_transaksi)) ?></td>
                                            <td>
                                                <a href="<?= base_url('pedagang/penjualan/show/' . $penjualan->id_penjualan) ?>" class="badge bg-info">Lihat Detail</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('pedagang/layouts/footer'); ?>