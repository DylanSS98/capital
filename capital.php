<?php
$pdo = new PDO('mysql:host=mysql;dbname=basedetest;host=127.0.0.1', 'root', "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
if (!isset($_POST['region'])) // Si la variable est vide, on affiche le formulaire des pays.
{
    $reponse=$pdo->query('SELECT Pays FROM pays') or die(print_r($pdo->errorInfo())); // Récupération de toutes les régions ?>
    <form action="" method="post">
        <p>
            <label for="pays">Choisir un pays</label><br />
            <select name="pays" id="pays" onchange="this.form.submit()">
                <?php while ($donnees=$reponse->fetch())
                {
                    ?>
                    <option value="<?php $donnees["Pays"]; ?>"><?php echo $donnees["Pays"]; ?></option>
                    <?php
                }
                $reponse->closecursor(); // termine le traitement de la requete
                ?>
            </select>
        </p>
        <button type="submit" class="btn btn-secondary mt-5">Valider</button>
    </form>
}
<?php


    $req=$pdo->prepare('SELECT Pays, Capitale FROM pays WHERE region = ?') or die(print_r($bdd->errorInfo()));
    $req->execute(array($_POST['Capitale']));
    $villes = $pdo->fetchAll();

    if ()

?>












