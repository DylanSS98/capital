<?php
//Se connecter à la base de données: ok//
$pdo = new PDO('mysql:host=mysql;dbname=basedetest;host=127.0.0.1', 'root', "");

//Créer la query (la requete) pour get toutes les données//
$query = "SELECT * FROM pays";

//Executer la query//
$queryBuilder = $pdo->query($query);
$capitales = $queryBuilder->fetchAll();

//Recupérer la capitale dans l'url  ($_GET) ensuite on stock la capitale dans une variable//
if (isset($_GET['capitale'])) {

    $getCapital = $_GET["capitale"];

//Préparer la requete pour chercher la capitale qui correspond au pays//
    $sql = "SELECT country FROM pays  WHERE capitale = :capitale";

    $prepare = $pdo->prepare($sql);

//passer les parametres dans une query//


    $prepare->bindParam(':capitale', $getCapital);

//executer la query//

    $prepare->execute();

    $country = $prepare->fetch();

    $result = "$getCapital" . " est la capitale de " . $country['country'];
}
    ?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="utf-8" />
    <title>Capitale</title>
</head>

<body>
<?php if(isset($result)): ?>

<h1><?= $result ?> </h1>

<?php else:?>

<h1>ya rien</h1>

<?php endif;?>

<form action="capitalev2.php" method="GET">
    <select name="capitale" class="form-control mx-10">
        
        <?php foreach ($capitales as $capitale):?>
            <option><?php echo $capitale["capitale"] ?> </option>
        <?php endforeach;?>
    </select>
    <button type="submit" class="btn btn-secondary mt-5">Valider</button>
</form>
</body>
</html>
