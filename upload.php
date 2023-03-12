<?php
if (isset($_POST['submit'])) {
    $target_dir = "videos/";
    $target_file = $target_dir . basename($_FILES["video"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Vérifier si le fichier est bien une vidéo
    $check = mime_content_type($_FILES["video"]["tmp_name"]);
    if(strpos($check, "video") === false) {
        echo "Le fichier n'est pas une vidéo.";
        $uploadOk = 0;
    }

    // Vérifier si le fichier existe déjà
    if (file_exists($target_file)) {
        echo "Désolé, un fichier portant ce nom existe déjà.";
        $uploadOk = 0;
    }

    // Vérifier la taille du fichier
    if ($_FILES["video"]["size"] > 500000000) {
        echo "Désolé, la taille du fichier est trop grande.";
        $uploadOk = 0;
    }

    // Autoriser les types de fichiers mp4 uniquement
    if($videoFileType != "mp4") {
        echo "Désolé, seuls les fichiers MP4 sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifier si $uploadOk est égal à 0
    if ($uploadOk == 0) {
        echo "Le fichier n'a pas été uploadé.";
    // Sinon essayer d'uploader le fichier
    } else {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
            echo "Le fichier ". basename( $_FILES["video"]["name"]). " a été uploadé.";
        } else {
            echo "Désolé, il y a eu une erreur lors de l'upload du fichier.";
        }
    }
}
?>
