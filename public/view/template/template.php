<?php
/*
    title : template.php
    author : Hugo.L
    started on : 13/12/19
    brief : view Template
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./../public/assets/css/templateG.css">
    <?= '<link rel="stylesheet" href="./../public/assets/css/' . $category . '/' . lcfirst($url[1]) . '.css">'; ?>

    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>
    
    <title>NoOx</title>
</head>
<body>
    <section id="logoNavContainer">
        <!-- logo -->
        <img src="./../public/assets/other/NoOxLogo.png" id="logoTopImg" alt="NoOx logo">
    </section>
    
    <?= require_once($fileView); ?>
    <script type="text/javascript">
        document.title = "<?=$title;?> | NoOx"
    </script>

</body>
</html>