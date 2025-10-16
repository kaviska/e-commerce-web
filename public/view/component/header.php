<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title><?= PAGE_TITLE ?></title>

       <link rel="shortcut icon" href="">

       <!-- css -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       <link rel="stylesheet" href="css/main.css">
       <?php
       foreach (CSS_FILES as  $value) {
       ?>
              <link rel="stylesheet" href="css/<?= $value ?>.css" />
       <?php
       }
       ?>

       <!-- script -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
       <script defer src="js/main.js"></script>
       <?php
       foreach (JAVASCRIPT_FILES as $value) {
       ?>
              <script src="js/<?= $value ?>.js"></script>
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