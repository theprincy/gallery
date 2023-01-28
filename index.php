<?php
$dir = '.'; // percorso della cartella da visualizzare
$exclude = array('.', '..',  'index.php', 'folder_name', 'logo.png'); // array per escludere file e cartelle specifiche

$files = array_diff(scandir($dir), $exclude);

/*//Apertura della cartella
$dir = opendir($folder);
echo '<div class="row">';


        
foreach($files as $file) {
    if(is_dir($file)) {
        // visualizzazione anteprima cartella
        echo '<div class="col-md-3">';
        echo '<a href="'.$file.'">';
        echo '<div class="thumbnail">';
        echo '<img src="/images/folder.png" alt="'.$file.'">';
        echo '<div class="caption">'.$file.'</div>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
   if(!in_array($file, $exclude)) {
            copy('index.php', $file.'/index.php');
        }
    }    else {
        // estensioni di file supportate
        $supported_ext = array('jpg', 'jpeg', 'bmp', 'png');
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if(in_array($ext, $supported_ext)) {
            // visualizzazione anteprima immagine
            echo '<div class="col-md-3">';
            echo '<a href="'.$file.'" data-lightbox="image-set">';
            echo '<div class="thumbnail">';
            echo '<img src="'.$file.'" alt="'.$file.'" width="200px">';
            echo '<div class="caption">'.$file.'</div>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
    }
}

echo '</div>';*/

//Apertura della cartella
//Apertura della cartella
$dir = opendir($folder);
echo '<div class="row">';

foreach($files as $file) {
if(is_dir($file)) {
// visualizzazione anteprima cartella
echo '<div class="col-md-3 col-sm-6">';
echo '<a href="'.$file.'">';
echo '<div class="thumbnail">';
echo '<img src="images/folder.png" alt="'.$file.'">';
echo '<div class="caption">'.$file.'</div>';
echo '</div>';
echo '</a>';
echo '</div>';
if(!in_array($file, $exclude)) {
copy('index.php', $file.'/index.php');
}
} else {
// estensioni di file supportate
$supported_ext = array('jpg', 'jpeg', 'bmp', 'png');
$ext = pathinfo($file, PATHINFO_EXTENSION);
if(in_array($ext, $supported_ext)) {
// visualizzazione anteprima immagine
echo '<div class="col-md-3 col-sm-6">';
echo '<a href="'.$file.'" data-lightbox="image-set">';
echo '<div class="thumbnail">';
echo '<img src="'.$file.'" alt="'.$file.'" width="200px">';
echo '<div class="caption">'.$file.'</div>';
echo '</div>';
echo '</a>';
echo '</div>';
}
}
}

echo '</div>';

// Creiamo il menu di navigazione nel footer
echo '<div class="nav-footer">
<a href="/images/" class="btn btn-primary " role="button">Home Archivio</a>
<a href="javascript:history.back()" class="btn btn-primary" role="button">Indietro</a> 
</div>';
?>
<!--include CDN Bootstrap CSS per la griglia-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--include CDN Lightbox per l'apertura delle immagini-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<style>
.btn-primary {color: #fff;background-color: #337ab7;border-color: #2e6da4;font-size: 1.3em;}
.nav-footer {text-align:center;}
   .row{margin: 6rem;}
   .caption {font-size: 1.2em;text-align: center;}
</style>
