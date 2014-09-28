<?php
class Import
{
    /**
    * Fonction pour l'upload d'un fichier
    *
    * @param string             $destinationPath       Répertoire d'upload
    * @param Input::file($name) $file                  Fichier transmis en POST recupéré par Input::file($name)
    *
    * @return  Retourne le nom du fichier uploader ou false
    */

    public static function uploadFichier($destinationPath, $file){
        $filename = $file->getClientOriginalName();
        $boolExtention = ($file->getClientOriginalExtension()=='zip')?true:false; // doit être zip
        $boolFormat = ($file->getClientOriginalExtension() == $file->guessExtension())?true:false; // compare le type mime et l'extension
        $boolSize = ($file->getClientSize()>130)?true:false; // Taille mini du fichier 125000

        $uploadSuccess = Input::file('csvFI')->move($destinationPath, $filename);

        if($boolExtention && $boolFormat && $boolSize && $uploadSuccess)
            return $filename;
        return false;
    }


    /**
    * Dézippe un fichier
    *
    * @param string $destinationPath          Répertoire ou se trouve le fichier
    * @param string $filename                 Nom du fichier
    * @param string $fileFormat               Format du fichier attendue
    *
    * @return  Retourne le nom du fichier dézippé ou false
    */
    public static function dezipFichier($destinationPath, $filename, $fileFormat){
        $zip = new ZipArchive;
        $erreurs[] = ($zip->open($destinationPath.'/'.$filename))?true:'Erreur lors de l\'ouverture du fichier';
        $erreurs[] = ($zip->extractTo($destinationPath))?true:'Erreur lors de l\'extraction du fichier';
        $nameFile  = $zip->getNameIndex(0);
        $erreurs[] = ($zip->close())?true:'Erreur lors de la fermeture du fichier';
        $erreurs[] = (unlink($destinationPath.'/'.$filename))?true:'Erreur lors de la suppression du fichier zip';

        $extensionFile = pathinfo($destinationPath.'/'.$nameFile, PATHINFO_EXTENSION);
        $erreurs[] = ( $extensionFile == $fileFormat )?true:'Erreur de format, mauvaise extension';

        foreach ($erreurs as $erreur) {
            if ($erreur !== true) return false;
        }
        return $nameFile;
    }


}