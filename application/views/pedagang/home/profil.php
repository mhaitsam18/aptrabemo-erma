<?php $this->load->view('pedagang/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Profil Saya</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Saya</h4>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-body">
                            <img class="img-thumbnail mb-3" src="<?= base_url('assets/img/uploads/' . $pedagang->foto) ?>" style="width: 200px;" alt="">
                            <form action="<?= base_url('pedagang/Home/profil/') ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control <?= (form_error('nama_lengkap')) ? 'is-invalid' : '' ?>" name="nama_lengkap" id="nama_lengkap" value="<?= set_value('nama_lengkap', $pedagang->nama_lengkap); ?>">
                                    <div id="nama_lengkap" class="invalid-feedback">
                                        <?= form_error('nama_lengkap') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select <?= (form_error('jenis_kelamin')) ? 'is-invalid' : '' ?>" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="" selected disabled>Pilih Gender</option>
                                        <option <?= (set_value('jenis_kelamin', $pedagang->jenis_kelamin) == "Laki-laki") ? 'selected' : ''; ?> value="Laki-laki">Laki-laki</option>
                                        <option <?= (set_value('jenis_kelamin', $pedagang->jenis_kelamin) == "Perempuan") ? 'selected' : ''; ?> value="Perempuan">Perempuan</option>
                                    </select>
                                    <div id="jenis_kelamin" class="invalid-feedback">
                                        <?= form_error('jenis_kelamin') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control <?= (form_error('nomor_telepon')) ? 'is-invalid' : '' ?>" name="nomor_telepon" id="nomor_telepon" value="<?= set_value('nomor_telepon', $pedagang->nomor_telepon); ?>">
                                    <div id="nomor_telepon" class="invalid-feedback">
                                        <?= form_error('nomor_telepon') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control <?= (form_error('alamat')) ? 'is-invalid' : '' ?>" name="alamat" id="alamat"><?= set_value('alamat', $pedagang->alamat); ?></textarea>
                                    <div id="alamat" class="invalid-feedback">
                                        <?= form_error('alamat') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="link_map" class="form-label">Link GMaps</label>
                                    <input type="text" class="form-control <?= (form_error('link_map')) ? 'is-invalid' : '' ?>" name="link_map" id="link_map" value="<?= set_value('link_map', $pedagang->link_map); ?>">
                                    <div id="link_map" class="invalid-feedback">
                                        <?= form_error('link_map') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input type="file" class="form-control <?= (form_error('foto')) ? 'is-invalid' : '' ?>" name="foto" id="foto">
                                    <input type="hidden" name="oldImage" value="<?= $pedagang->foto ?>">
                                    <div id="foto" class="invalid-feedback">
                                        <?= form_error('foto') ?>
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