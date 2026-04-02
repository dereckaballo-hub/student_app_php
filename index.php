<?php
    session_start();

    if(isset($_SESSION['notification']))
    {
        $type = $_SESSION['notification']['type'];
        $message = $_SESSION['notification']['message'];

        $class = $type === 'error' ? 'alert-danger' : 'alert-success';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fa;
        }
        .error-box{
            padding: 10px;
            background-color: #eddbd7ff;
            color: red;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid red;
        }

        .success-box{
            padding: 10px;
            background-color: #dbf3ddff;
            color: green;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid green;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"><i class="bi bi-backpack-fill text-success"></i> Liste des étudiants</h2>

            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary fw-bold">
                <i class="bi bi-person-fill-add"></i> Ajouter
            </button>
        </div>

        <?php if(isset($_SESSION['notification'])): ?>
            <div class="alert <?= $class ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <div class="card shadow rounded p-3 mt-2">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                   </tr>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <small class="text-danger text-center mt-3" id="error"></small>

                    <form action="create.php" method="POST" id="studentForm">
                        <div class="modal-body">
                            <div class="form-group mb-4">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom de l'étudiant">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Adresse email de l'étudiant">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script> 
        const form = document.getElementById('studentForm');
        const error = document.getElementById('error');
        
        form.addEventListener('submit', function(e){
            const nom = document.getElementById('nom');
            const email = document.getElementById('email');

            if(nom.value.trim() === "" || email.value.trim() === "")
            {
                error.textContent = "Veuillez remplir tous les champs requis";
                e.preventDefault();
            }
        });

        function confirmDeletion(){
            return confirm("Êtes vous sûre de vouloir supprimer cet élément ?");
        }
    </script>
</body>
</html>