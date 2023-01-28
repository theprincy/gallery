<style>
    /* add css for grid layout and styling for folders and files */
.folder {
    display: inline-block;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
}

.file {
    display: inline-block;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
}
</style>
<?php
//Includiamo i file CSS e JS per la libreria Lightbox e la visualizzazione in griglia tramite CDN
echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="grid.css">';

//Definiamo la cartella da visualizzare
$folder = './';

//Definiamo le estensioni dei file da visualizzare
$extensions = array("jpg", "jpeg", "bmp", "png");

//Definiamo le cartelle da escludere dalla visualizzazione
$excludeFolders = array(".", "..", "folder_name" );

//Definiamo i file da escludere dalla visualizzazione
$excludeFiles = array(".", "..", "file.ext" );

//Funzione per escludere cartelle e file
function exclude($name, $excludeFolders, $excludeFiles) {
    if(in_array($name, $excludeFolders) || in_array($name, $excludeFiles)) {
        return true;
    } else {
        return false;
    }
}
//Funzione per copiare il file index.php nelle cartelle e sottocartelle
function copyIndex($folder, $excludeFolders) {
    $dir = opendir($folder);
    while($file = readdir($dir)) {
        if(is_dir($file) && !exclude($file, $excludeFolders, array())) {
            if(!file_exists($file.'/index.php')) {
                copy('index.php', $file.'/index.php');
            }
            copyIndex($file, $excludeFolders);
        }
    }
    closedir($dir);
}

//Eseguiamo la funzione di copia
copyIndex($folder, $excludeFolders);
//Apertura della cartella
$dir = opendir($folder);

//Array per contenere i file e le cartelle
$files = array();
$folders = array();

//Navigazione tra i file e le cartelle
while($file = readdir($dir)) {
    if(!is_dir($file) && in_array(pathinfo($file, PATHINFO_EXTENSION), $extensions) && !exclude($file, $excludeFolders, $excludeFiles)) {
        array_push($files, $file);
    } elseif(is_dir($file) && !exclude($file, $excludeFolders, $excludeFiles)) {
        array_push($folders, $file);
    }
}

//Ordinamento dei file e delle cartelle
sort($files);
sort($folders);

echo '<div class="grid-container">';

//Visualizzazione dei file
foreach($files as $file) {
    echo '<a href="'.$folder.$file.'" data-lightbox="image-1" data-title="'.$file.'"><img src="'.$folder.$file.'" class="grid-item" width="200px"></a>';
}

//Visualizzazione delle cartelle
foreach($folders as $folder) {
    echo '<a href="'.$folder.'"><div class="grid-item">'.$folder.'</div></a>';
}

echo '</div>';

//Chiusura della cartella
closedir($dir);
echo '<footer>';
echo '<a href="index.php">Home</a>';
echo '<a href="#" onclick="history.back()">Indietro</a>';
echo '<a href="#" onclick="history.forward()">Avanti</a>';
echo '</footer>';

?>
