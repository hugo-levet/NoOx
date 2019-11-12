<?php

    try
    {
        $bdd = new PDO('mysql:host=projet-noox_databse;dbname=log', '193036', 'Projetnoox');
    }
    catch (Exception $e) // Si erreur
    {
        die('Erreur : ' . $e->getMessage());
    }