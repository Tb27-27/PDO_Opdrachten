<?php

echo "<style>

table {
    width: 100%;
    background: linear-gradient(to bottom, #f5f5dc,rgb(244, 244, 237));
}

table, th, td {
    border: 1px solid;
    padding: 10px;
    text-align: center;
    font-weight: 900;
}

th, td {
    width: auto;
}

a {
    width: 100px;
    height: 50px;
    color: white;
    padding: 6px;
    border-radius: 5px;
    text-decoration: none;  
}

.edit_button {
    background-color: blue;
}

.edit_button:hover {
    background-color: #3273a8;
}

.delete_button {
    background-color: red;
}


.delete_button:hover {
 background-color: #ad343a;
}

h1 {
    text-align: center;
}

</style>";


require 'Database_Connectie.php';

$sql = "SELECT * FROM producten";
$rows = $pdo->query($sql)->fetchAll();

echo "<h1>Producten overzicht</h1>";
echo    "<table>  
            <tr>
                <th>Product code</th>
                <th>Naam</th>
                <th>Prijs per stuk</th>
                <th>Omschrijving</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";

foreach ($rows as $row) {
    echo  "<tr>
                <td>" . $row['product_code'] . "</td>
                <td>" . $row['product_naam'] . "</td>
                <td>" . $row['prijs_per_stuk'] . "</td>
                <td>" . $row['omschrijving'] . "</td>
                <td>" . "<a href='' class='edit_button'>Edit</a>". "</td>
                <td>" . "<a href='' class='delete_button'>Delete</a>" . "</td>
            </tr>";
}

echo "</table>";

?>
