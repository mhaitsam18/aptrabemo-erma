<?php $this->load->view('admin/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Data Toko</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Toko</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <a href="<?= base_url('admin/toko/create/' . $pedagang->id_user) ?>" class="btn btn-primary mb-3">Tambah Data Toko</a>
                            <table class="table table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Toko</th>
                                        <th scope="col">Deskripsi Toko</th>
                                        <th scope="col" style="width: 100px;">Gambar Toko</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_toko as $toko) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $toko->nama_toko ?></td>
                                            <td><?= $toko->deskripsi_toko ?></td>
                                            <td><img src="<?= base_url('assets/img/uploads/' . $toko->gambar_toko) ?>" alt="<?= $toko->nama_toko ?>" class="img-thumbnail"></td>
                                            <td>
                                                <a href="<?= base_url('admin/toko/delete/' . $toko->id_toko) ?>" class="badge bg-danger">Hapus</a>
                                                <a href="<?= base_url('admin/toko/edit/' . $toko->id_toko) ?>" class="badge bg-success">Ubah</a>
                                                <a href="<?= base_url('admin/toko/show/' . $toko->id_toko) ?>" class="badge bg-info">Detail</a>
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