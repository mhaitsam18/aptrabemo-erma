<?php $this->load->view('pembeli/layouts/head', ['title' => $title]); ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <?= $this->session->flashdata('message'); ?>
        <h3>Selamat Datang di Beranda Aptrabemo</h3>
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
                                        <h6 class="text-muted font-semibold">Profile Views</h6>
                                        <h6 class="font-extrabold mb-0">112.000</h6>
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
                                        <h6 class="text-muted font-semibold">Followers</h6>
                                        <h6 class="font-extrabold mb-0">183.000</h6>
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
                                        <h6 class="text-muted font-semibold">Following</h6>
                                        <h6 class="font-extrabold mb-0">80.000</h6>
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
                                        <h6 class="text-muted font-semibold">Saved Post</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
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
                                <img src="<?= base_url('assets/img/uploads/' . $this->session->userdata('foto')); ?>" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold"><?= $this->session->userdata('nama_lengkap'); ?></h5>
                                <h6 class="text-muted mb-0">@<?= $this->session->userdata('username'); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($this->cart->total_items() > 0) : ?>
                <div class="col-12 col-lg-12 mb-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#keranjangModal">
                        <i class="fa-solid fa-cart-shopping"></i> Lihat Keranjang
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="keranjangModal" tabindex="-1" aria-labelledby="keranjangModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="keranjangModalLabel">Lihat Keranjang</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php if ($this->cart->total_items() > 0) : ?>
                                    <h3 class="h3 mt-5">Detail Keranjang</h3>
                                    <table class="table table-bordered" style="background-color: white;" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Sub Total</th>
                                                <th scope="col" style="max-width: 150px; min-width: 90px;">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0; ?>
                                            <?php foreach ($this->cart->contents() as $item) : ?>
                                                <tr>
                                                    <th scope="row"><?= ++$no ?></th>
                                                    <td><?= $item['name'] ?></td>
                                                    <td align="left"><?= 'Rp.' . number_format($item['price'], 2, ',', '.') ?></td>
                                                    <td align="left"><?= 'Rp.' . number_format($item['subtotal'], 2, ',', '.') ?></td>
                                                    <td>
                                                        <a href="<?= base_url('pembeli/keranjang/kurang/') . $item['rowid'] . '/' . $item['qty'] ?>" class="badge bg-danger"><i class="fas fa-minus"></i></a>
                                                        <?= $item['qty'] ?>
                                                        <a href="<?= base_url('pembeli/keranjang/tambah/') . $item['id'] . '/' . $item['rowid'] ?>" class="badge bg-primary"><i class="fas fa-plus"></i></a>
                                                    </td>
                                                </tr>

                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" align="right"><b>Total : </b></td>
                                                <td align="left" colspan="2"><b><?= 'Rp.' . number_format($this->cart->total(), 2, ',', '.') ?></b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <a href="<?= base_url('pembeli/keranjang/checkout') ?>" class="btn btn-danger float-end ml-3">
                                        Check Out
                                    </a>
                                    <a href="<?= base_url('pembeli/keranjang/bersihkan') ?>" class="btn btn-secondary float-end ml-3">
                                        Batal
                                    </a>
                                <?php endif ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <!-- <a href="" class="btn btn-success">Checkout</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div class="col-12 col-lg-12">
                <div class="row">
                    <?php foreach ($data_produk as $produk) : ?>
                        <div class="col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-bottom img-fluid" src="<?= base_url('') ?>assets/images/samples/building.jpg" alt="Card image cap" style="height: 20rem; object-fit: cover;">
                                    <div class="card-body">
                                        <span class="badge bg-success float-end">Rp.<?= number_format($produk->harga_konsumen, 2, ',', '.'); ?></span>
                                        <h4 class="card-title"><?= $produk->nama_produk; ?></h4>
                                        <p class="card-text">
                                            <?= $produk->tentang_produk; ?>
                                        </p>
                                        <a href="#" class="card-link"><small>Stok: <?= $produk->stok ?></small></a>
                                        <a href="<?= base_url('pembeli/Keranjang/tambah/' . $produk->id_produk) ?>" class="btn btn-sm btn-primary float-end">Tambah Keranjang</a>
                                    </div>
                                    <div class="btn-group align-items-center mx-2 px-1">
                                        <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                            <i class="bi bi-heart d-flex align-items-center justify-content-center text-secondary"></i>
                                        </button>
                                        <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                            <i class="bi bi-chat d-flex align-items-center justify-content-center text-secondary"></i>
                                        </button>
                                        <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                            <i class="bi bi-cart-plus d-flex align-items-center justify-content-center text-secondary"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>

</div>

<?php $this->load->view('pembeli/layouts/footer'); ?>