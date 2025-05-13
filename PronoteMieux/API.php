<?php 
// ajout d'un truc 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");

//echo 'debut de activite2 <br>' ;
//variables de connexion
$host = 'localhost';		
$dbname = 'notes';
$username = 'root';
$password = '';

//tentative de connexion à la base de donnée
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
    // on récupère la liste des noms et prénoms des élèves existants 
    $requete2 = 'SELECT Nom FROM Notes';
    $requete3 = 'SELECT Prenom FROM Notes';

    // on les places dans un tableau 
    $nomsEleves = $bdd->query($requete2);
    $tableau2 = $nomsEleves->fetchall(); 
    $prenomsEleves = $bdd->query($requete3);
    $tableau3 = $prenomsEleves->fetchall(); 

    // on parcourt les tableaux pour déterminer si l'tilisateur existe 
    for ($i = 0; $i < 5; $i++)
    {
        if ($utilisateur == "Placin")
        {
            $requete = 'SELECT Matiere, Notes FROM Notes WHERE Nom LIKE "Placin"';
        }
        else if ($utilisateur == "Chaniaud")
        {
            $requete = 'SELECT Matiere, Notes FROM Notes WHERE Nom LIKE "Chaniaud"';
        }
        else if ($utilisateur == "Peuplu")
        {
            $requete = 'SELECT Matiere, Notes FROM Notes WHERE Nom LIKE "Peuplu"';
        }
        else if ($utilisateur = "Ptipeu" && $mdp = "JustinPtipeu")
        {
            $requete = 'SELECT Matiere, Notes FROM Notes WHERE Nom LIKE "Ptipeu"';
        }
        else if ($utilisateur = "Verse" && $mdp = "AlainVerse")
        {
            $requete = 'SELECT Matiere, Notes FROM Notes WHERE Nom LIKE "Verse"';
        }
        else if ($utilisateur = "Donçavapaslatête" && $mdp = "EddyDonçavapaslatête")
        {
            $requete = 'SELECT Matiere, Notes FROM Notes WHERE Nom LIKE "Donçavapaslatête"';
        }
        else 
        {
            print_r("Erreur");
        }
        $resultat = $bdd->query($requete);
        $tableau = $resultat->fetchall();  
    }
     envoiJSON($tableau);
}

authentification($utilisateur,$mdp,$bdd);

?>
