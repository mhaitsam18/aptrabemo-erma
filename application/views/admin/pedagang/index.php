<?php $this->load->view('admin/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Data pedagang</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data pedagang</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <a href="<?= base_url('admin/pedagang/create/') ?>" class="btn btn-primary mb-3">Tambah Data pedagang</a>
                            <table class="table table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" style="width: 100px;">Foto</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_pedagang as $pedagang) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $pedagang->username ?></td>
                                            <td><?= $pedagang->nama_lengkap ?></td>
                                            <td><?= $pedagang->email ?></td>
                                            <td><img src="<?= base_url('assets/img/uploads/' . $pedagang->foto) ?>" alt="<?= $pedagang->nama_lengkap ?>" class="img-thumbnail"></td>
                                            <td>
                                                <a href="<?= base_url('admin/pedagang/delete/' . $pedagang->id_user) ?>" class="badge bg-danger">Hapus</a>
                                                <a href="<?= base_url('admin/pedagang/edit/' . $pedagang->id_user) ?>" class="badge bg-success">Ubah</a>
                                                <a href="<?= base_url('admin/pedagang/show/' . $pedagang->id_user) ?>" class="badge bg-info">Detail</a>
                                                <a href="<?= base_url('admin/toko/index/' . $pedagang->id_user) ?>" class="badge bg-warning">Lihat Toko</a>
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
<?php $this->load->view('admin/layouts/footer'); ?>