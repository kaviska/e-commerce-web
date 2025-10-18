<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title><?= PAGE_TITLE ?></title>


       <link rel="icon" href="../../resources/images/output.png" type="image/x-icon">
       <link rel="shortcut icon" href="../../resources/images/output.png" type="image/x-icon">


       <!-- css -->
       <!-- Option 1: Include in HTML -->

       <link rel="stylesheet" href="css/bootstrap.css">
       <link href="https://unpkg.com/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">




       <link rel="stylesheet" href="css/main.css">
       <link rel="stylesheet" href="css/style.css">

       <?php
       foreach (CSS_FILES as  $value) {
       ?>
              <link rel="stylesheet" href="css/<?= $value ?>.css" />
       <?php
       }
       ?>

       <!-- script -->
       <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
       
       <script defer src="js/bootstrap.bundle.js"></script>
       
       <script defer src="js/main.js"></script>
       
       <?php
       foreach (JAVASCRIPT_FILES as $value) {
       ?>
              <script defer src="js/<?= $value ?>.js"></script>
       <?php
       }
       ?>
</head>

<body>
       <?php
       //check custom header
       if (!IS_CUSTOM_HEADER) {
              include_once("header-section.php");
       }
       ?>