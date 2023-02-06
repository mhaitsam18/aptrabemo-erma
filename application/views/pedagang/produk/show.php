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
                                    <h6 class="font-extrabold mb-0"><?= $produk->dilihat ?></h6>
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
                                    <h6 class="font-extrabold mb-0">-</h6>
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
                                    <h6 class="font-extrabold mb-0">-</h6>
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
                                    <h6 class="font-extrabold mb-0"><?= $produk->stok ?></h6>
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
                                                <td><?= number_format($produk->berat) ?> gram</td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <td>Tanggal dibuat</td>
                                            <td>:</td>
                                            <td><?= date('j F Y H:i:s', strtotime($produk->created_at)) ?></td>
                                        </tr>
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
                                        <tr>
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
                                        </tr>
                                        <tr>
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
                                        </tr>
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
    </section>
</div>
<?php $this->load->view('pedagang/layouts/footer'); ?>