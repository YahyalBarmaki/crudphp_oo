<?php
/*function __autoload($class)
{
    require_once "classes/$class." . "php";
}*/
require "classes/Db.php";
require "classes/Etudiants.php";
if (isset($_GET['id'])) 
    {
        $uid = $_GET['id'];
        $etudiant = new Etudiants();
        $result = $etudiant->selectOne($uid);
        
    }
if (isset($_POST['Ajouter']))
 {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];

    $fields = [
        'nom' => $nom,
        'prenom' => $prenom,
        'mail' => $mail
    ] ;
    $modifE = new Etudiants();
    $id = $_POST['id'];
    $modifE->update($fields,$id);
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Université</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Formation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h4 class="mb-4">Ajouter étudiant</h4>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $result['id']?>">
                        <div class="form-group">
                            <label for="Nom:">Nom:</label>
                            <input type="nom" class="form-control" name="nom" aria-describedby="nom" placeholder="Entrer votre nom" value="<?php echo $result['nom'];?>">
                        </div>
                        <div class="form-group">
                            <label for="Prénom">Prénom:</label>
                            <input type="prenom" class="form-control" name="prenom" placeholder="Entrer votre prénom" value="<?php echo $result['prenom'];?>">
                        </div>
                        <div class="form-group">
                            <label for="mail">Mail:</label>
                            <input type="mail" class="form-control" name="mail" placeholder="Entrer votre mail" value="<?php echo $result['mail'];?>">
                        </div>
                        <input type="submit" name="Ajouter" value="Modifier" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>