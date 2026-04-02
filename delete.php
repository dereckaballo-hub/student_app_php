<?php
    session_start();

    require('db.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        // Vérification de la validité de l'id
        if($id <= 0 || !is_numeric($id))
        {
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => 'Identifiant invalide'
            ];
            header("Location: index.php");
            exit();
        }

        // Exécution du script de suppression
        try{
            $sql = 'DELETE FROM students WHERE id=:id LIMIT 1';

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            $_SESSION['notification'] = [
                'type' => 'success',
                'message' => "Étudiant supprimé avec succès"
            ];
            header("Location: index.php");
            exit();

        }catch(PDOException $e){
            $_SESSION['notification'] = [
                'type' => 'error',
                'message' => "Oups! Quelque chose s'est mal passé"
            ];
            header("Location: index.php");
            exit();
        }


    }
?>