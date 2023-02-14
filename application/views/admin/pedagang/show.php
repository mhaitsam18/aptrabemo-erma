<?php $this->load->view('admin/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Profil Pedagang</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
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
                                    <h6 class="text-muted font-semibold">Kunjungan Toko</h6>
                                    <h6 class="font-extrabold mb-0">112 Pengunjung</h6>
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
                                    <h6 class="text-muted font-semibold">Pengikut</h6>
                                    <h6 class="font-extrabold mb-0">10 Pengikut</h6>
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
                                    <h6 class="text-muted font-semibold">mengikuti</h6>
                                    <h6 class="font-extrabold mb-0">80 orang</h6>
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
                                    <h6 class="text-muted font-semibold">Jumlah Toko</h6>
                                    <h6 class="font-extrabold mb-0"><?= $jumlah_toko ?> toko</h6>
                                </div>
                            </div>
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
                            <h4>Profil Pedagang</h4>
                        </div>
                        <div class="card-body">
                            <img class="img-thumbnail mb-3" src="<?= base_url('assets/img/uploads/' . $pedagang->foto) ?>" style="width: 200px;" alt="">
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('admin/pedagang/edit/') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?= $pedagang->id_user ?>">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>" name="username" id="username" value="<?= set_value('username', $pedagang->username); ?>">
                                    <div id="username" class="invalid-feedback">
                                        <?= form_error('username') ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : '' ?>" name="email" id="email" value="<?= set_value('email', $pedagang->email); ?>">
                                    <div id="email" class="invalid-feedback">
                                        <?= form_error('email') ?>
                                    </div>
                                </div>
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
<?php $this->load->view('admin/layouts/footer'); ?>