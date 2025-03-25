<?php

    // require het db.php in het bovenstaande bestand.
    require 'Database_Connectie.php';
    
    if (isset($_POST["submit_knop"])) {

        $productNaam = $_POST['product_naam'];
        $prijsPerStuk = $_POST['prijs_per_stuk'];
        $omschrijving = $_POST['omschrijving'];
        $categorie = $_POST['categorie'];

        if (!$productNaam || !$prijsPerStuk || !$omschrijving || !$categorie) {
            echo "Een of meerdere velden zijn leeg!";
        }
        else
        {
            $query=
            'insert into producten (
                product_naam, 
                prijs_per_stuk, 
                omschrijving,
                categorie
                ) 
            values (
                :product_naam, 
                :prijs_per_stuk, 
                :omschrijving,
                :categorie
            )';

            $result=$pdo->prepare($query);
            $data= array(
                "product_naam" => $productNaam,
                "prijs_per_stuk" => $prijsPerStuk,
                "omschrijving" => $omschrijving,
                "categorie" => $categorie
            );

            $result->execute($data);

            echo 
            "Product succesvol toegevoegd: <br>
            Naam: $productNaam <br>
            Prijs per stuk: $prijsPerStuk <br>
            Omschrijving: $omschrijving <br> 
            Categorie: $categorie <br><br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Voeg 3 input fields in je formulier toe (product_naam, prijs_per_stuk, omschrijving) en een button. -->
    <form method="POST">
        <label for="product_naam">Naam:</label><br>
        <input type="text" name="product_naam" placeholder="Product naam" required pattern="[A-Za-z\s]+"> <br><br>

        <label for="prijs_per_stuk">Prijs:</label><br>
        <input type="number" name="prijs_per_stuk" step="0.01" required placeholder="5.99"><br><br>

        <label for="omschrijving">Omschrijving:</label><br>
        <input type="text" name="omschrijving" placeholder="Omschrijving" required pattern="[A-Za-z\s]+"><br><br>

        <label for="categorie">Categorie:</label><br>
        <select name="categorie" placeholder="Categorie" required pattern="[A-Za-z\s]+">
            <!-- drinken, eten, kleding, electronica -->
            <option value="drinken">Drinken</option>
            <option value="eten">Eten</option>
            <option value="kleding">Kleding</option>
            <option value="electronica">Electronica</option>
        </select><br><br>

        <input type="submit" name="submit_knop"><br><br>
    </form>
</body>
</html>