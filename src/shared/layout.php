<?php
    $rootUrl = "http://" .$_SERVER['HTTP_HOST'] . $_ENV["SUB_DIR"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $pageTitle ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <!-- Option 1: Include in HTML -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" type="text/css" href=<?= $relativePath . 'assets/css/nice-select.css' ?>>
        <link rel="stylesheet" type="text/css" href="<?= $relativePath . 'assets/css/slick.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?= $relativePath . 'assets/css/styles.css' ?>">
    </head>
    <body class="antialiased">

    <header>
        <?php require($relativePath . 'src/shared/top-nav.php'); ?>
        <?php require($relativePath . 'src/shared/searchbar.php'); ?>
        <?php require($relativePath . 'src/shared/sidebar.php'); ?>        
    </header>