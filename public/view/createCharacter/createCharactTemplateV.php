<?php
/*  
    title : creareCharactNameV.php
    author : Audrey
    started-on : 19/12/2019

    brief : view create Charact 1st page
*/

$styleName = 'character/createCharact.css' ;

ob_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../../public/assets/css/character/templateFP.css">
    <link rel="stylesheet" href="<?='../../../public/assets/css/'.$styleName;?>">

    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>   

    <script src="../../../public/assets/js/character.js" defer></script>

    <title>Document</title>
</head>
<body>

<?=$content ?>

<div id="PageTitle">
    Création du personnage
</div>

<?php
    require('createCharactTemplateV.php')
?>