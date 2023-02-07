<?php $this->load->view('admin/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Laporan Aptrabemo</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-header">
                            <h4>Data Toko</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Toko</th>
                                        <th scope="col">Nama Pemilik</th>
                                        <th scope="col">Deskripsi Toko</th>
                                        <th scope="col" style="width: 100px;">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_toko as $toko) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $toko->nama_toko ?></td>
                                            <td><?= $toko->nama_lengkap ?></td>
                                            <td><?= $toko->deskripsi_toko ?></td>
                                            <td><img src="<?= base_url('assets/img/uploads/' . $toko->gambar_toko) ?>" alt="<?= $toko->nama_toko ?>" class="img-thumbnail"></td>
                                            <td>
                                                <a href="<?= base_url('admin/toko/show/' . $toko->id_toko) ?>" class="badge bg-info">Detail</a>
                                                <a href="<?= base_url('admin/laporan/toko/' . $toko->id_toko) ?>" class="badge bg-primary">Lihat Laporan</a>
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