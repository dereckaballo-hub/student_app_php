<?php
    session_start();

    require('db.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        if($id <= 0 || !is_numeric($id))
        {
            header("Location: index.php");
            exit();
        }

        $sql = "SELECT * FROM students WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        $student = $stmt->fetch();
        
        if(!$student)
        {
            die("Etudiant non trouvé");
        }
    }else{
        header("Location: index.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .card{
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card">
            <div class="card-header text-center">
                <h5>Modifier un étudiant</h5>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group mb-4">
                        <label for="nom">Nom</label>
                        <input type="text" value="<?= htmlspecialchars($student['nom']) ?>" name="nom" placeholder="Nom de l'étudiant" class="form-control">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="email">Email</label>
                        <input type="text" value="<?= htmlspecialchars($student['email']) ?>" name="email" placeholder="Email de l'étudiant" class="form-control">
                    </div>
                    <button class="btn btn-primary w-100">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>