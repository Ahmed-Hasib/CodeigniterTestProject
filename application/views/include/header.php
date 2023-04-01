<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php if (isset($title)) echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/customeStyle.css') ?>" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Brand') ?>">Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Model') ?>">Model</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Item'); ?>">Items</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>