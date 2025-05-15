<?php 
// ajout d'un truc 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

//variables de connexion
$host = 'localhost';		
$dbname = 'notes';
$username = 'root';
$password = '';

//tentative de connexion à la base de données
try {
	$bdd = new PDO('mysql:host='. $host .';dbname='. $dbname .';charset=utf8',
	$username, $password);
    //echo 'connexion établie <br>' ; //vérifie la connexion

} catch(Exception $e) {
	// Si erreur, tout arrêter + message
	die('Erreur de connexion à la BDD : '. $e->getMessage());
}

//préparation de la requête
$utilisateur =$_GET["utilisateur"];
$mdp=$_GET["motdepasse"];

function envoiJSON($donnees) {
    $json = json_encode($donnees, JSON_UNESCAPED_UNICODE) ;
    echo $json ; 
}

function authentification($utilisateur, $mdp, $bdd) {
    $etudiants = [ // création d'une liste des utilisateurs autorisés avec id = prenom et mdp = nom 
        "Frederic" => "Placin",
        "Noemie" => "Chaniaud",
        "Jean" => "Peuplu",
        "Justin" => "Ptipeu",
        "Alain" => "Verse",
        "Eddy" => "Donçavapaslatête"
    ];

   // vérification des identifiants entrés par l'utilisateur
   if (isset($etudiants[$utilisateur]) && $etudiants[$utilisateur] === $mdp) {
    $nom = $etudiants[$utilisateur]; //récupère le nom de l'étudiant
    $requete = $bdd->prepare('SELECT Matiere, Notes FROM Notes WHERE Nom = ?');
    $requete->execute([$nom]);
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC); //récupérer les résultats

    envoiJSON($resultats); 

} else {
    // si l'identifiant ou le mot de passe est incorrect
    envoiJSON(["success" => false, "message" => "Identifiants invalides"]);
}
}

authentification($utilisateur, $mdp, $bdd);
?>