<?php
    session_start();
    require('db.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $nom = trim($_POST['nom']) ?? "";
        $email = trim($_POST['email']) ?? "";

        if(!empty($nom) && !empty($email))
        {
            try{
                $sql = 'INSERT INTO students(nom, email) VALUES(:nom, :email)';
                
                $stmt = $pdo->prepare($sql);

                $stmt->execute([
                    ':nom' => $nom,
                    ':email' => $email
                ]);

                $_SESSION['notification'] = [
                    'type' => 'success',
                    'message' => 'Étudiant enregistré avec succès'
                ];

                header("Location: index.php");
                exit();

            }catch(PDOException $e){
                die("Erreur lors de l'enregistrement");
            }
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