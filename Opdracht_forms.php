<?php

    if (isset($_POST["submit-knop"])) {
        $totaalbedrag = $_POST["totaalbedrag"];
        $aantalpersonen = $_POST["aantalpersonen"];
        $fooi = isset($_POST["fooi"]) ? floatval($_POST["fooi"]) : 0;

        if ($totaalbedrag <= 0) {
                echo "<p>Fout: Het totaalbedrag moet positief zijn</p>";
            }
            else
            {
            if ($aantalpersonen < 1) {
                "<p>Fout: het aantal personen moet minstens 1 zijn.</p>";
            }
            else 
            {
                $totaalbedrag += $fooi;
                $kosten_per_persoon = number_format($totaalbedrag / $aantalpersonen, 2);

                echo "<p>Totaalbedrag inclusief fooi: € $totaalbedrag. </p>";
                echo "<p>Aantal personen:  $aantalpersonen. </p>";
                echo "<p>Kosten per persoon: € $kosten_per_persoon.</p>";
            };
        };
    };

?>

<!DOCTYPE html>
<html>
<head>
    <title>Rekening Delen</title>
</head>
<body>
    <h1>Rekening Delen</h1>
    <form method="post">
        <label for="totaalbedrag">Totaalbedrag:</label>
        <br>
        <input type="number" name="totaalbedrag" placeholder="100.00" step="0.01" required >
        
        <br><br><br>

        <label for="aantalpersonen">Aantal Personen:</label>
        <br>
        <input type="number" name="aantalpersonen" min="1"  placeholder="1" step="1" required>
        
        <br><br><br>
        
        <label for="fooi">Fooi (optioneel):</label>
        <br>
        <input type="number" name="fooi" placeholder="5.00" step="0.01">
        
        <br><br><br>

        <input type="submit" name="submit-knop" value="Bereken">
    </form>
</body>
</html>



