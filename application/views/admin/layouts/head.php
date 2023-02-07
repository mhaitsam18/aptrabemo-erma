<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aptrabemo | <?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= base_url('') ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('') ?>assets/images/logo/favicon.png" type="image/png">


    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/shared/iconly.css">

    <!-- dari table-datatable-jquery.html -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/pages/datatables.css">
</head>

<body>
    <div id="app">
        <?php $this->load->view('admin/layouts/sidebar'); ?>

        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <?php $this->load->view('admin/layouts/navbar'); ?>
            </header>
            <div id="main-content">