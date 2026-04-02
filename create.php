<?php
    session_start();
    require('db.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $nom = trim($_POST['nom']) ?? "";
        $email = trim($_POST['email']) ?? "";

        if(!empty($nom) && !empty($email))
        {
            // Traitement d'insertion
        }else{
            // Message champs vides
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Veuillez remplir tous les champs requis'
            ];

            header("Location: index.php");
            exit();
        }
    }
?>