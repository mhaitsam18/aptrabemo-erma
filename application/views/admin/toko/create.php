<?php $this->load->view('admin/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Tambah Data Toko</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Data Toko</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('admin/toko/create/' . $pedagang->id_user) ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?= $pedagang->id_user ?>">
                                <div class="mb-3">
                                    <label for="nama_toko" class="form-label">Nama Toko</label>
                                    <input type="text" class="form-control <?= (form_error('nama_toko')) ? 'is-invalid' : '' ?>" name="nama_toko" id="nama_toko" value="<?= set_value('nama_toko'); ?>">
                                    <div id="nama_toko" class="invalid-feedback">
                                        <?= form_error('nama_toko') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi_toko" class="form-label">Deskripsi Toko</label>
                                    <textarea type="text" class="form-control <?= (form_error('deskripsi_toko')) ? 'is-invalid' : '' ?>" name="deskripsi_toko" id="deskripsi_toko"><?= set_value('deskripsi_toko'); ?></textarea>
                                    <div id="deskripsi_toko" class="invalid-feedback">
                                        <?= form_error('deskripsi_toko') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_toko" class="form-label">Gambar Toko</label>
                                    <input type="file" class="form-control <?= (form_error('gambar_toko')) ? 'is-invalid' : '' ?>" name="gambar_toko" id="gambar_toko">
                                    <div id="gambar_toko" class="invalid-feedback">
                                        <?= form_error('gambar_toko') ?>
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
<?php $this->load->view('admin/layouts/footer'); ?>