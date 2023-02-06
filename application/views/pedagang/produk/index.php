<?php $this->load->view('pedagang/layouts/head', ['title' => $title]); ?>
<div class="page-heading">
    <h3>Data Produk</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Produk</h4>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message');
                            ?>
                            <a href="<?= base_url('pedagang/produk/create/' . $toko->id_toko) ?>" class="btn btn-primary mb-3">Tambah Data Produk</a>
                            <table class="table table-responsive" id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga Konsumen</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col" style="width: 100px;">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($data_produk as $produk) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $produk->nama_produk ?></td>
                                            <td><?= $produk->harga_konsumen ?></td>
                                            <td><?= $produk->keterangan ?></td>
                                            <td><img src="<?= base_url('assets/img/uploads/' . $produk->gambar_produk) ?>" alt="<?= $produk->nama_produk ?>" class="img-thumbnail"></td>
                                            <td>
                                                <!-- <a href="<?= base_url('pedagang/Produk/delete/' . $produk->id_produk) ?>" class="badge bg-danger">Hapus</a>
                                                <a href="<?= base_url('pedagang/Produk/edit/' . $produk->id_produk) ?>" class="badge bg-success">Ubah</a> -->
                                                <a href="<?= base_url('pedagang/Produk/show/' . $produk->id_produk) ?>" class="badge bg-info">Detail</a>
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