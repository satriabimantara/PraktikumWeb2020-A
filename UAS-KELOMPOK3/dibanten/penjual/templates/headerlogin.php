<?php
include '../../config/class.php'; //sudah mengandung file init.php

// cek session get untuk penamaan page
if (isset($_GET['page'])) {
    $titlePage = $_GET['page'];
} else {
    $titlePage = "Login Penjual";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titlePage; ?></title>
    <!-- Connect to the bootstrap -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <!-- Connect to our style -->
    <link rel="stylesheet" href="../../assets/css/penjual.css">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- My fonts -->
    <!-- My fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Montserrat:wght@500&family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Montserrat:wght@500&family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">

</head>

<body class=" bg-login">