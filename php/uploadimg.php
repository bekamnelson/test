<?php
session_start();


function sendfiles($files){
    if(isset($files)) {
       $file = $files;
       $fileName = $file['name'];
       $fileTmpName = $file['tmp_name'];
       $fileSize = $file['size'];
       $fileError = $file['error'];
       $fileType = $file['type'];
   
       $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
   
       $allowedExtensions = array("jpg", "jpeg", "png", "gif","jfif");
   
       if(in_array($fileExt, $allowedExtensions)) {
           if($fileError === 0) {
               if($fileSize < 500000) {
                   $newFileName = uniqid('', true) . "." . $fileExt;
                   $fileDestination = "uploads/" . $newFileName;
                   move_uploaded_file($fileTmpName, $fileDestination);
                   return $newFileName;
                   echo "Le fichier a été téléchargé avec succès.";
                   return false;
               } else {
                   echo "Le fichier est trop volumineux, veuillez sélectionner un fichier de moins de 500 Ko.";
                   return false;
               }
           } else {
               echo "Une erreur s'est produite lors du téléchargement de votre fichier.";
               return false;
           }
       } else {
           echo "Le type de fichier que vous avez sélectionné n'est pas autorisé. Les types de fichiers autorisés sont : " . implode(", ", $allowedExtensions) . ".";
           return false;
       }
   }
    }









?>