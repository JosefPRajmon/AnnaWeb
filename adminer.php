<html>
    <header>
    <meta charset="utf-8"/>
        <link rel="stylesheet" href="css.css" type="text/css"/> 
    </header>
    <body>
        <?php
                if(!isset($mess)){

        $mess="";
        }
            echo($mess);
           // echo($_FILES);

        ?>
        <h2>Ovládací stránka</h2>
        <form action="adminer.php" method="get">
            <input type="submit" name="NImg" value="Vový obrázek">
            <input type="submit" name="OImg" value="Správa obrázků">
        </form>        

        
        <?php
        include("database.php");
        if(isset($_GET["NImg"]))
        {
            $dir = 'uploads/';
            $files = scandir($dir);
            echo("
            <form action=\"adminer.php\" method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\">
            <input type=\"text\" name=\"Name\" placeholder=\"Jméno obrázku\">
            <input type=\"text\" name=\"Description\" placeholder=\"Popisek\">
            <input type=\"submit\" name=\"Uploud\" value=\"Přidat do galerie\"></br>
        <div  style=\"display: flex; flex-wrap: wrap;\">
            ");
            foreach($files as $file) {
                if($file == '.' || $file == '..') continue;
                echo '<div style="margin: 10px;">';
                echo '<img height="200" src="'.$dir.$file.'" alt="'.$file.'">';
                echo '<br/><input type="checkbox" name="selected_files[]" value="'.$dir.$file.'"> Vybrat tento soubor';
                echo '</div>';
            }
            

            echo("</div></form>");
            if(isset($_POST["Uploud"])){
                $selected_files = $_POST['selected_files'];
                $alladress ="";
                foreach ($selected_files as $file) {
                    $alladress=$file . ',';
                }
                $data = array(
                    "Description" => $_POST["Description"],
                    "ImagePath" => $alladress,
                    "OriginalDigitalVersion" => 1,
                    "LimitedEditionOf50" => 1,
                    "AllSizesOptions" =>  1
                );
                insertIntoDatabase($data,"galery");
            }
        }
        if(isset($_GET["OImg"]))
        {
            echo("test2");
        }

        ?><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $("form").on("submit", function(event){
                event.preventDefault();
        
                $.ajax({
                    url: 'adminer.php', // Cesta k PHP skriptu, který zpracovává data
                    type: 'post',
                    data: $(this).serialize(), // Serializuje data formuláře pro odeslání
                    success: function(response) {
                        // Zde můžete aktualizovat stránku s odpovědí ze serveru
                        console.log(response);
                    }
                });
            });
        });
        </script>
        
    </body>
</html>