<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Home page view</h1>
    <!-- if we make new / with not exist path the image will not load so we put the absoulte path of it -->
    <!-- [php echo] =  [=] -->
    <img src="<?php echo ROOT?>/assets/images/asta.png" alt="asta">
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT?>/assets/css/style.css">
    <!-- and we can get js files like this although -->
</body>
</html>