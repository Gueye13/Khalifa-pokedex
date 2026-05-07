<?php
try{
    $dns = "mysql:host=gateway01.eu-central-1.prod.aws.tidbcloud.com;port=4000;dbname=Khalifa_pokedex;";

    $option = [ 
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
        PDO::MYSQL_ATTR_SSL_CA => true,
    ];

    $utilisateur = '4XXrHyTvikonyQY.root';
    $motDePasse = 'OauTdruYs04u7JS7';

    $connection = new PDO($dns, $utilisateur, $motDePasse, $option);
} catch (Exception $e) {
    echo "Connection à la BDD impossible : {$e->getMessage()}";
}

// Prépare la requête
$select = $connection->query("SELECT * FROM pokemon;");

 // Envoie la requête à la BDD et récupères les resulats dans un tableau d'objet
 $pokemons = $select->fetchAll(PDO::FETCH_OBJ);

// Affiche les données en HTML
foreach ($pokemons as $pokemon)
{
    echo ("<h1> {$pokemon->pokemon_id}, {$pokemon->pokemon_nom} </h1>");
}


?>