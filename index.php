<!DOCTYPE html>
<html>
<head>
    <title>Visualizzatore di file</title>
    <style>
     
        /* Stili personalizzati */
        body {
            background-color: #f2f2f2;
        }
        .file-table {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .file-row {
            width: 30%;
            margin: 16px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
        }
        .file-name {
            padding: 16px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            background-color: #3498db;
            color: #fff;
        }
        .file-type {
            padding: 16px;
            font-size: 14px;
            text-align: center;
            color: #555;
        }
        /* Estendi lo stile lightbox */
        #lightboxOverlay{
            background-color: rgba(0,0,0,0.9);
        }
        #lightbox{
            background-color: #fff;
        }
        #lightboxDetails{
            background-color: #fff;
        }
    </style>
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
</head>
<body>
    <div id="file-container"></div>
    <script>
    // Inserisci qui il tuo codice JavaScript
    document.addEventListener("DOMContentLoaded", function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("file-container").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "./", true);
        xhttp.send();
    });
    </script>
    <?php
    $dir = "./"; // cartella da cui vuoi visualizzare i file
    $handle = opendir($dir);
    echo "<div class='file-table'>";
    while ($file = readdir($handle)) {
        if ($file != "." && $file != "..") {
            if (is_dir($file)) {
                $type = "Cartella";
                echo "<div class='file-row'>";
                echo "<div class='file-name'>$file</div>";
                echo "<div class='file-type'>$type</div>";
                echo "</div>";
            } else {
                // estensioni supportate
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                if($ext == "jpg" || $ext == "jpeg" || $ext == "bmp" || $ext == "png") {
                    $type = "Immagine";
                    echo "<div class='file-row'>";
                    echo "<div class='file-name'><a href='$file' data-lightbox='image-set' data-title='$file'>$file</a></div>";
                    echo "<div class='file-type'>$type</div>";
                    echo "</div>";
                }
            }
        }
    }
    echo "</div>";
    closedir($handle);
    ?>
</body>
</html>
