<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php echo 'debut de activite2 <br>' ;
//variables de connexion
$host = 'localhost';		
$dbname = 'notes';
$username = 'root';
$password = '';

//tentative de connexion à la base de donnée
try {
	$bdd = new PDO('mysql:host='. $host .';dbname='. $dbname .';charset=utf8',
	$username, $password);
    echo 'connexion établie <br>' ; //vérifie la connexion

} catch(Exception $e) {
	// Si erreur, tout arrêter
	die('Erreur : '. $e->getMessage());
}
//préparation de la requête
$requete = '';
//requête auprès de la base
$resultat = $bdd->query($requete);
// On récupère tout dans la variable tableau
$tableau = $resultat->fetchall();  
?>

</body>
</html>