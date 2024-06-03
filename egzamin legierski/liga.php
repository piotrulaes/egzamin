<?php
    $conn = new mysqli("localhost","root","","egzamin");
?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>piłka nożna</title>
        <link rel="stylesheet" href="styl2.css">
    </head>
    <body>
        <header>
            <h3>Reprezentacja polski w piłce nożnej</h3>
            <img src="obraz1.jpg" alt="reprezentacja">
        </header>

        <div id="lewy">
            <form action="liga.php" method="post">
                <select name="rola" id="rola">
                    <option value="1">Bramkarze</option>
                    <option value="2">Obrońcy</option>
                    <option value="3">Pomocnicy</option>
                    <option value="4">Napastinicy</option>
                </select>
                <button type="submit">Zobacz</button>
            </form>
            <img src="zad2.png" alt="piłka">
            <p>Autor: <a href="https://ee-informatyk.pl/" target="_blank" style="color: unset;text-decoration: none;">EE-Informatyk.pl</a></p>
        </div>

        <div id="prawy">
            <ol>
                <?php
                    // Skrypt #1
                    if(isset($_POST["rola"])) {
                        $rola = $_POST["rola"];

                        $sql = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = $rola;";
                        $result = $conn->query($sql);
    
                        while($row = $result -> fetch_array()) {
                            echo "<li><p>$row[0] $row[1]</p></li>";
                        }
                    }
                ?>
            </ol>
        </div>

        <main>
            <h3>Liga mistrzów</h3>
        </main>

        <div id="liga">
            <?php
                // Skrypt #2
                $sql = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;";
                $result = $conn->query($sql);

                while($row = $result -> fetch_array()) {
                    echo "<div class='mecz'>";
                        echo "<h2>$row[0]</h2>";
                        echo "<h1>$row[1]</h1>";
                        echo "<p>grupa: $row[2]</p>";
                    echo "</div>";
                }
            ?>
        </div>
    </body>
</html>

<?php
    $conn -> close();
?>