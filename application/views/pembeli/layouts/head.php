<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aptrabemo | <?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/main/app.css">
    <link rel="shortcut icon" href="<?= base_url(''); ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(''); ?>assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/shared/iconly.css">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <?php $this->load->view('pembeli/layouts/header'); ?>