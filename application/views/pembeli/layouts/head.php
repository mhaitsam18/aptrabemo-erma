<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aptrabemo | <?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/main/app.css">
    <link rel="shortcut icon" href="<?= base_url(''); ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(''); ?>assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/shared/iconly.css">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <?php $this->load->view('pembeli/layouts/header'); ?>