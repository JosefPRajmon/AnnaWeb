<?php
function insertIntoDatabase($data, $table) {
    // Připojení k databázi
    $mysqli = new mysqli('localhost', 'Anna', '{@7BF41e54}@', 'annaweb');

    // Kontrola připojení
    if ($mysqli->connect_error) {
        die('Chyba při připojení: ' . $mysqli->connect_error);
    }

    // Vytvoření části SQL dotazu s názvy sloupců
    $columns = implode(",", array_keys($data));

    // Vytvoření části SQL dotazu s hodnotami
    $values = implode(", ", array_map(function ($value) use ($mysqli) {
        return "'" . $mysqli->real_escape_string($value) . "'";
    }, array_values($data)));

    // Vytvoření SQL dotazu
    $sql = "INSERT INTO $table ($columns) VALUES ($values)";

    // Provedení SQL dotazu
    if ($mysqli->query($sql) === TRUE) {
        echo "Nový záznam byl úspěšně vložen.";
    } else {
        echo "Chyba: " . $sql . "<br>" . $mysqli->error;
    }

    // Uzavření připojení
    $mysqli->close();
}
function getTopThree() {
    // Připojení k databázi
    $mysqli = new mysqli('localhost', 'Anna', '{@7BF41e54}@', 'annaweb');

    // Kontrola připojení
    if ($mysqli->connect_error) {
        die('Chyba při připojení: ' . $mysqli->connect_error);
    }

    // SQL dotaz
    $sql = "SELECT * FROM galery ORDER BY Id DESC LIMIT 3";

    // Vykonání dotazu
    $result = $mysqli->query($sql);
    $array = array();
    // Kontrola výsledku
    if ($result->num_rows > 0) {
        // Výpis dat každého řádku
        while($row = $result->fetch_assoc()) {
           // echo "id: " . $row["Id"]. "<br>";
            array_push($array,$row);
        }
        if (count($array) < 3) {
            $countToAdd = 3 - count($array);
            for ($i = 0; $i < $countToAdd; $i++) {
                array_push($array, $array[0]);
            }
        }
        
        return $array;
    } else {
        echo "0 výsledků";
    }

    // Uzavření připojení
    $mysqli->close();
}

function getElementById($id) {
    // Připojení k databázi
    $mysqli = new mysqli('localhost', 'Anna', '{@7BF41e54}@', 'annaweb');

    // Kontrola připojení
    if ($mysqli->connect_error) {
        die('Chyba při připojení: ' . $mysqli->connect_error);
    }

    // SQL dotaz s použitím WHERE klauzule pro filtrování podle Id
    $sql = "SELECT * FROM galery WHERE Id = $id";

    // Vykonání dotazu
    $result = $mysqli->query($sql);

    // Kontrola výsledku
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row; // Vrátí prvek s daným Id
    } else {
        // Pokud prvek s daným Id není nalezen
        return null;
    }

    // Uzavření připojení
    $mysqli->close();
}
