<?php
include "../../config/class.php";
if (isset($_GET['page'])) {
    $titlePage = $_GET['page'];
}else{
    $titlePage = "Home";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titlePage;?></title>
    <!-- Connect to bootsrap -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <!-- Connect to pembeli.css -->
    <link rel="stylesheet" href="../../assets/css/pembeli.css">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- jquery -->
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <!-- our js script -->
    <script type="text/javascript" src="../../assets/js/pembeli.js"></script>
    <!-- Accounting js for currency format -->
    <script type="text/javascript" src="../../assets/js/accounting.js"></script>

</head>

<body>
    