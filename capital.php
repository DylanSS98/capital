<?php
$pdo = new PDO('mysql:host=mysql;dbname=basedetest;host=127.0.0.1', 'root', "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$requete = $pdo->query('SELECT * FROM pays');
$requete->bindParam('pays',$pays);
$requete->bindParam('Capitale', $Capitale);
$requete->execute();
$pdo = $requete->fetchAll();{

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
<h1>Capitale</h1>
<form action="capital.php" method="GET">
    <select name="Capitale" class="form-control mx-10">
        <option>Default select</option>
        <?php foreach ($Capitale as $items): ?>
            <option name="<?= $items["Capitale"]?>" ><?= $items["Capitale"]?></option>
        <?php endforeach;?>
    </select>
    <button type="submit" class="btn btn-secondary mt-5">Valider</button>
</form>
</body>
</html>




