<?php $this->load->view('pedagang/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Detail Produk</h3>
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
                                    <h6 class="text-muted font-semibold">dilihat</h6>
                                    <h6 class="font-extrabold mb-0"><?= $produk->dilihat ?> kali</h6>
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
                                    <h6 class="text-muted font-semibold">Income</h6>
                                    <h6 class="font-extrabold mb-0">Rp. <?= number_format(0, 2, ',', '.') ?></h6>
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
                                    <h6 class="text-muted font-semibold">disukai</h6>
                                    <h6 class="font-extrabold mb-0">0 orang</h6>
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
                                    <h6 class="text-muted font-semibold">Jumlah Stok</h6>
                                    <h6 class="font-extrabold mb-0"><?= $produk->stok ?> <?= $produk->satuan ?></h6>
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
                            <img src="<?= base_url('assets/img/uploads/' . $produk->gambar_toko); ?>" alt="Gambar Toko">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= $produk->nama_toko; ?></h5>
                            <h6 class="text-muted mb-0">@<?= $this->session->userdata('username') ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Produk</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="col-md-9">
                                <table>
                                    <caption>
                                        <img src="<?= base_url('assets/img/uploads/' . $produk->gambar_produk) ?>" alt="" class="img-thumbnail">
                                    </caption>
                                    <tbody>
                                        <tr>
                                            <th width="300px"></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>Nama Produk</td>
                                            <td>:</td>
                                            <td><?= $produk->nama_produk ?></td>
                                        </tr>
                                        <tr>
                                            <td>Perusahaan pemasok</td>
                                            <td>:</td>
                                            <!-- <td><?= $produk->nama_perusahaan ?></td> -->
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>:</td>
                                            <!-- <td><?= $produk->kategori ?></td> -->
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Tentang Produk</td>
                                            <td>:</td>
                                            <td><?= $produk->tentang_produk ?></td>
                                        </tr>
                                        <tr>
                                            <td>Satuan</td>
                                            <td>:</td>
                                            <td><?= $produk->satuan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga Beli</td>
                                            <td>:</td>
                                            <td>Rp.<?= number_format($produk->harga_beli, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga Reseller</td>
                                            <td>:</td>
                                            <td>-</td>
                                            <!-- <td>Rp.<?= number_format($produk->harga_reseller, 2, ',', '.') ?></td> -->
                                        </tr>
                                        <tr>
                                            <td>Harga Jual/Konsumen</td>
                                            <td>:</td>
                                            <td>Rp.<?= number_format($produk->harga_konsumen, 2, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td>Berat</td>
                                            <td>:</td>
                                            <?php if ($produk->berat > 1000) : ?>
                                                <td><?= number_format($produk->berat / 1000) ?> Kg</td>
                                            <?php else : ?>
                                                <td><?= number_format($produk->berat) . ' ' . $produk->satuan_berat ?> </td>
                                            <?php endif; ?>
                                        </tr>
                                        <!-- <tr>
                                            <td>Tanggal dibuat</td>
                                            <td>:</td>
                                            <td><?= date('j F Y H:i:s', strtotime($produk->created_at)) ?></td>
                                        </tr> -->
                                        <tr>
                                            <td>Tentang Produk</td>
                                            <td>:</td>
                                            <td><?= $produk->tentang_produk ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td><?= $produk->keterangan ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tag</td>
                                            <td>:</td>
                                            <td><?= $produk->tag ?></td>
                                        </tr>
                                        <tr>
                                            <td>dilihat</td>
                                            <td>:</td>
                                            <td><?= $produk->dilihat ?></td>
                                        </tr>
                                        <tr>
                                            <td>disukai</td>
                                            <td>:</td>
                                            <!-- <td><?= $produk->disukai ?></td> -->
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td><?= $produk->stok ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Tambah Stok</td>
                                            <td>:</td>
                                            <td>
                                                <form action="<?= base_url('pedagang/produk/tambah_stok') ?>" method="post">
                                                    <input type="hidden" id="id_produk" name="id_produk" value="<?= $produk->id_produk ?>">
                                                    <input type="hidden" id="stok" name="stok" value="<?= $produk->stok ?>">
                                                    <div class="input-group mb-3" style="width: 500px;">
                                                        <input type="text" class="form-control" name="tambah_stok" placeholder="Tambah Stok" aria-label="Tambah Stok" aria-describedby="tambah_stok">
                                                        <button class="btn btn-outline-primary" type="submit" id="tambah_stok">Tambah Stok</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr> -->
                                        <tr>
                                            <td>Update Stok</td>
                                            <td>:</td>
                                            <td>
                                                <a href="<?= base_url("pedagang/suplai/index/$produk->id_toko/$produk->id_produk") ?>" class="btn btn-outline-primary btn-sm">Buka Halaman Suplai</a>

                                                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#suplaiModal">
                                                    Tambah Stok produk
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Ubah Stok</td>
                                            <td>:</td>
                                            <td>
                                                <form action="<?= base_url('pedagang/produk/ubah_stok') ?>" method="post">
                                                    <input type="hidden" id="id_produk" name="id_produk" value="<?= $produk->id_produk ?>">
                                                    <div class="input-group mb-3" style="width: 500px;">
                                                        <input type="text" class="form-control" name="stok" placeholder="Ubah Stok" aria-label="Ubah Stok" aria-describedby="stok">
                                                        <button class="btn btn-outline-primary" type="submit" id="stok">Ubah Stok</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Penjualan</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="suplaiModal" tabindex="-1" aria-labelledby="suplaiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="suplaiModalLabel">Form penyuplaian stok produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url("pedagang/suplai/index/$produk->id_toko/$produk->id_produk") ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_toko" value="<?= $produk->id_toko ?>">
                <input type="hidden" name="id_produk" value="<?= $produk->id_produk ?>">
                <div class="modal-body">
                    <!-- <div class="mb-3">
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
                    </div> -->
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
<?php $this->load->view('pedagang/layouts/footer'); ?>