<?php $this->load->view('pedagang/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Data Suplai Produk <?= $toko->nama_toko ?></h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Suplai</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($produk) : ?>
                                <h5>Nama Produk : <?= $produk->nama_produk ?></h5>
                            <?php endif ?>
                            <?= $this->session->flashdata('message');
                            ?>
                            <!-- <a href="<?= base_url('pedagang/suplai/create/' . $toko->id_toko) ?>" class="btn btn-primary mb-3">Tambah Stok Produk</a> -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#suplaiModal">
                                Tambah Stok produk
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="suplaiModal" tabindex="-1" aria-labelledby="suplaiModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="suplaiModalLabel">Update stok produk</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url("pedagang/suplai/index/$toko->id_toko/$produk->id_produk") ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_toko" value="<?= $toko->id_toko ?>">
                                            <!-- <input type="hidden" name="id_produk" value="<?= $toko->id_produk ?>"> -->
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="id_produk" class="form-label">Produk</label>
                                                    <select class="form-select <?= (form_error('id_produk')) ? 'is-invalid' : '' ?>" name="id_produk" id="id_produk" <?= (!empty($produk)) ? 'readonly' : ''; ?>>
                                                        <option value="" selected disabled>Pilih Produk</option>
                                                        <?php foreach ($data_produk as $opt_produk) : ?>
                                                            <option value="<?= $opt_produk->id_produk ?>" <?= ($produk && $opt_produk->id_produk == $produk->id_produk) ? 'selected' : ''; ?>><?= $opt_produk->nama_produk ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div id="id_produk" class="invalid-feedback">
                                                        <?= form_error('id_produk') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nomor_kuitansi" class="form-label">Nomor Kuitansi</label>
                                                    <input type="text" class="form-control <?= (form_error('nomor_kuitansi')) ? 'is-invalid' : '' ?>" name="nomor_kuitansi" id="nomor_kuitansi" value="<?= set_value('nomor_kuitansi'); ?>">
                                                    <div id="nomor_kuitansi" class="invalid-feedback">
                                                        <?= form_error('nomor_kuitansi') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jumlah" class="form-label">Jumlah</label>
                                                    <input type="number" class="form-control <?= (form_error('jumlah')) ? 'is-invalid' : '' ?>" name="jumlah" id="jumlah" value="<?= set_value('jumlah'); ?>">
                                                    <div id="jumlah" class="invalid-feedback">
                                                        <?= form_error('jumlah') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="satuan" class="form-label">Satuan</label>
                                                    <input type="text" class="form-control <?= (form_error('satuan')) ? 'is-invalid' : '' ?>" name="satuan" id="satuan" value="<?= set_value('satuan'); ?>">
                                                    <div id="satuan" class="invalid-feedback">
                                                        <?= form_error('satuan') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga_total" class="form-label">Total Harga</label>
                                                    <input type="number" class="form-control <?= (form_error('harga_total')) ? 'is-invalid' : '' ?>" name="harga_total" id="harga_total" value="<?= set_value('harga_total'); ?>" step="any">
                                                    <div id="harga_total" class="invalid-feedback">
                                                        <?= form_error('harga_total') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                                    <input type="text" class="form-control <?= (form_error('nama_pegawai')) ? 'is-invalid' : '' ?>" name="nama_pegawai" id="nama_pegawai" value="<?= set_value('nama_pegawai'); ?>">
                                                    <div id="nama_pegawai" class="invalid-feedback">
                                                        <?= form_error('nama_pegawai') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bukti" class="form-label">Bukti Transaksi</label>
                                                    <input type="file" class="form-control <?= (form_error('bukti')) ? 'is-invalid' : '' ?>" name="bukti" id="bukti" value="<?= set_value('bukti'); ?>">
                                                    <div id="bukti" class="invalid-feedback">
                                                        <?= form_error('bukti') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col">
                                                        <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                                                        <input type="date" class="form-control <?= (form_error('tanggal_transaksi')) ? 'is-invalid' : '' ?>" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= set_value('tanggal_transaksi'); ?>">
                                                        <div id="tanggal_transaksi" class="invalid-feedback">
                                                            <?= form_error('tanggal_transaksi') ?>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <label for="waktu_transaksi" class="form-label">Waktu Transaksi</label>
                                                        <input type="time" class="form-control <?= (form_error('waktu_transaksi')) ? 'is-invalid' : '' ?>" name="waktu_transaksi" id="waktu_transaksi" value="<?= set_value('waktu_transaksi'); ?>">
                                                        <div id="waktu_transaksi" class="invalid-feedback">
                                                            <?= form_error('waktu_transaksi') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="penyuplai" class="form-label">Penyuplai / Suplier</label>
                                                    <input type="text" class="form-control <?= (form_error('penyuplai')) ? 'is-invalid' : '' ?>" name="penyuplai" id="penyuplai" value="<?= set_value('penyuplai'); ?>">
                                                    <div id="penyuplai" class="invalid-feedback">
                                                        <?= form_error('penyuplai') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="catatan" class="form-label">Catatan</label>
                                                    <textarea type="text" class="form-control <?= (form_error('catatan')) ? 'is-invalid' : '' ?>" name="catatan" id="catatan"><?= set_value('catatan'); ?></textarea>
                                                    <div id="catatan" class="invalid-feedback">
                                                        <?= form_error('catatan') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nomor Kuitansi</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total Harga</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Waktu Transaksi</th>
                                        <th scope="col">Penyuplai</th>
                                        <th scope="col" style="width: 100px;">Bukti</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_suplai as $suplai) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $suplai->nomor_kuitansi ?></td>
                                            <td><?= $suplai->nama_produk ?></td>
                                            <td><?= $suplai->jumlah ?></td>
                                            <td><?= $suplai->satuan ?></td>
                                            <td><?= $suplai->harga_total ?></td>
                                            <td><?= $suplai->nama_pegawai ?></td>
                                            <td><?= $suplai->waktu_transaksi ?></td>
                                            <td><?= $suplai->penyuplai ?></td>
                                            <td>
                                                <?php if (!empty($suplai->bukti)) : ?>
                                                    <img src="<?= base_url('assets/img/uploads/' . $suplai->bukti) ?>" alt="Bukti" class="img-thumbnail">
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <!-- <a href="<?= base_url('pedagang/Suplai/delete/' . $suplai->id_suplai) ?>" class="badge bg-danger">Hapus</a> -->
                                                <!-- <a href="<?= base_url('pedagang/Suplai/edit/' . $suplai->id_suplai) ?>" class="badge bg-success">Ubah</a> -->
                                                <!-- <a href="<?= base_url('pedagang/Suplai/show/' . $suplai->id_suplai) ?>" class="badge bg-info">Detail</a> -->
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