<?php $this->load->view('admin/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Laporan <?= $toko->nama_toko ?></h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header">
                            <h4>Detail Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">Waktu Transaksi</th>
                                        <th scope="col">Kode Transaksi</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Nama Kustomer</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Diskon</th>
                                        <th scope="col">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total = 0;
                                    foreach ($data_laporan as $laporan) : ?>
                                        <tr>
                                            <th scope="row"><?= date('j F Y H:i:s', strtotime($laporan->waktu_transaksi)) ?></th>
                                            <td><?= $laporan->kode_transaksi ?></td>
                                            <td><?= $laporan->nama_produk ?></td>
                                            <td><?= $laporan->nama_lengkap ?></td>
                                            <td><?= $laporan->jumlah ?></td>
                                            <td><?= $laporan->satuan ?></td>
                                            <td>Rp.<?= number_format($laporan->harga_jual, 2, ',', '.') ?></td>
                                            <td><?= $laporan->diskon * 100 ?>%</td>
                                            <td>Rp.<?= number_format($laporan->sub_total, 2, ',', '.') ?></td>
                                        </tr>
                                        <?php $total += $laporan->sub_total; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-end" colspan="8" scope="col">Total:</th>
                                        <th scope="col">Rp.<?= number_format($total, 2, ',', '.') ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('admin/layouts/footer'); ?>