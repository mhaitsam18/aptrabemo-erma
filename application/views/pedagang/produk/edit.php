<?php $this->load->view('pedagang/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Ubah Data Produk</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Data Produk</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message');
                            ?>
                            <form action="<?= base_url('pedagang/Produk/edit/' . $produk->id_toko) ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_produk" id="id_produk" value="<?= $produk->id_produk ?>">
                                <input type="hidden" name="id_toko" id="id_toko" value="<?= $produk->id_toko ?>">
                                <!-- <div class="mb-3">
                                    <label for="id_perusahaan" class="form-label">Perusahaan Pemasok</label>
                                    <select class="form-select <?= (form_error('id_perusahaan')) ? 'is-invalid' : '' ?>" name="id_perusahaan" id="id_perusahaan">
                                        <option value="" selected disabled>Pilih Perusahaan</option>
                                    </select>
                                    <div id="id_perusahaan" class="invalid-feedback">
                                        <?= form_error('id_perusahaan') ?>
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Kategori Produk</label>
                                    <select class="form-select <?= (form_error('id_kategori')) ? 'is-invalid' : '' ?>" name="id_kategori" id="id_kategori">
                                        <option value="" selected disabled>Pilih Kategori</option>
                                    </select>
                                    <div id="id_kategori" class="invalid-feedback">
                                        <?= form_error('id_kategori') ?>
                                    </div>
                                </div> -->
                                <!-- <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>') ?> -->
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control <?= (form_error('nama_produk')) ? 'is-invalid' : '' ?>" name="nama_produk" id="nama_produk" value="<?= set_value('nama_produk', $produk->nama_produk); ?>">
                                    <div id="nama_produk" class="invalid-feedback">
                                        <?= form_error('nama_produk') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input type="text" class="form-control <?= (form_error('satuan')) ? 'is-invalid' : '' ?>" name="satuan" id="satuan" value="<?= set_value('satuan', $produk->satuan); ?>">
                                    <div id="satuan" class="invalid-feedback">
                                        <?= form_error('satuan') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="harga_beli" class="form-label">Harga Beli</label>
                                    <input type="number" class="form-control <?= (form_error('harga_beli')) ? 'is-invalid' : '' ?>" name="harga_beli" id="harga_beli" value="<?= set_value('harga_beli', $produk->harga_beli); ?>" step="any">
                                    <div id="harga_beli" class="invalid-feedback">
                                        <?= form_error('harga_beli') ?>
                                    </div>
                                </div>
                                <!-- <div class="mb-3">
                                        <label for="harga_reseller" class="form-label">Harga Reseller</label>
                                        <input type="number" class="form-control <?= (form_error('harga_reseller')) ? 'is-invalid' : '' ?>" name="harga_reseller" id="harga_reseller" value="<?= set_value('harga_reseller', $produk->harga_reseller); ?>" step="any">
                                        <div id="harga_reseller" class="invalid-feedback">
                                            <?= form_error('harga_reseller') ?>
                                        </div>
                                    </div> -->
                                <div class="mb-3">
                                    <label for="harga_konsumen" class="form-label">Harga Konsumen</label>
                                    <input type="number" class="form-control <?= (form_error('harga_konsumen')) ? 'is-invalid' : '' ?>" name="harga_konsumen" id="harga_konsumen" value="<?= set_value('harga_konsumen', $produk->harga_konsumen); ?>" step="any">
                                    <div id="harga_konsumen" class="invalid-feedback">
                                        <?= form_error('harga_konsumen') ?>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col">
                                        <label for="berat" class="form-label">Berat</label>
                                        <input type="number" class="form-control <?= (form_error('berat')) ? 'is-invalid' : '' ?>" name="berat" id="berat" value="<?= set_value('berat', $produk->berat); ?>" step="any">
                                        <div id="berat" class="invalid-feedback">
                                            <?= form_error('berat') ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="satuan_berat" class="form-label">Satuan Berat</label>
                                        <input type="number" class="form-control <?= (form_error('satuan_berat')) ? 'is-invalid' : '' ?>" name="satuan_berat" id="satuan_berat" value="<?= set_value('satuan_berat', $produk->satuan_berat); ?>" step="any">
                                        <div id="satuan_berat" class="invalid-feedback">
                                            <?= form_error('satuan_berat') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_produk" class="form-label">Gambar Produk</label>
                                    <input type="file" class="form-control <?= (form_error('gambar_produk')) ? 'is-invalid' : '' ?>" name="gambar_produk" id="gambar_produk">
                                    <input type="hidden" name="oldImage" value="<?= $produk->gambar_produk ?>">
                                    <div id="gambar_produk" class="invalid-feedback">
                                        <?= form_error('gambar_produk') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tentang_produk" class="form-label">Tentang Produk</label>
                                    <textarea class="form-control <?= (form_error('tentang_produk')) ? 'is-invalid' : '' ?>" name="tentang_produk" id="tentang_produk"><?= set_value('tentang_produk', $produk->tentang_produk); ?></textarea>
                                    <div id="tentang_produk" class="invalid-feedback">
                                        <?= form_error('tentang_produk') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control <?= (form_error('keterangan')) ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan"><?= set_value('keterangan', $produk->keterangan); ?></textarea>
                                    <div id="keterangan" class="invalid-feedback">
                                        <?= form_error('keterangan') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tag" class="form-label">Tag-tag</label>
                                    <textarea class="form-control <?= (form_error('tag')) ? 'is-invalid' : '' ?>" name="tag" id="tag"><?= set_value('tag', $produk->tag); ?></textarea>
                                    <div id="tag" class="invalid-feedback">
                                        <?= form_error('tag') ?>
                                    </div>
                                    <small>Contoh: Fashion, Wanita, Baju, Muslimah (pisahkan tag dengan koma)</small>
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" class="form-control <?= (form_error('stok')) ? 'is-invalid' : '' ?>" name="stok" id="stok" value="<?= set_value('stok', $produk->stok); ?>">
                                    <div id="stok" class="invalid-feedback">
                                        <?= form_error('stok') ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('pedagang/layouts/footer'); ?>