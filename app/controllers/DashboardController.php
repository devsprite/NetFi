<?php
class DashboardController extends BaseController{

    public function __construct() {
        $this->beforeFilter('csrf', array('on'=>'post'));
        $this->beforeFilter('auth', array('only'=>array('getIndex', 'getImportfi')));
    }

    public function getIndex(){
        return View::make('dashboard.index');
    }

    public function getImportfi(){
        return View::make('dashboard.importfi');
    }

    public function postImportfi(){
        $file = Input::file('csvFI');
        if($file == null) return Redirect::to('compte/dashboard/importfi');

        $destinationPath = 'uploads/'.str_random(8);


        $filename = Import::uploadFichier($destinationPath,$file);
        if(!$filename){
            Session::flash('message','Erreur d\'upload (Format, taille, serveur ...)');
            Session::flash('class','alert alert-danger');
            return Redirect::to('compte/dashboard/importfi');
        }

        $nameFile = Import::dezipFichier($destinationPath, $filename, 'csv');
        if(!$nameFile){
            Session::flash('message','Erreur lors de la décompression du fichier');
            Session::flash('class','alert alert-danger');
            return Redirect::to('compte/dashboard/importfi');
        }

        // On récupère les noms des colonnes de la table
        $col = DB::table('fiches')->first();
        foreach ($col as $key => $value) {
            $colonnes[] = $key;
        }
        array_shift($colonnes); // Enleve le champs id
        array_pop($colonnes); 	// enleve les champs created_at et updated_at
        array_pop($colonnes);

        // Création de la requete
        $reqChamps  = 'INSERT INTO `netfi`.`fiches` (';
        $reqDrapeaux= '';
        foreach ($colonnes as $value) {
            $reqChamps    .= '`'.utf8_encode($value).'`, ';
            $reqDrapeaux  .= '?, ';
        }
        $reqFinale = substr($reqChamps, 0, -2).') VALUES ('.substr($reqDrapeaux, 0, -2).');';

        // Connection à la BD
        $pdo = DBPdo::connexPDO();

        $fichier = fopen($destinationPath.'/'.$nameFile,'rb');
        DB::table('fiches')->truncate();
        $erreur = 0;

        while ($lines = fgetcsv($fichier, 1024, ';')) {
                $stmt = $pdo->prepare($reqFinale);
                if(preg_match('/[0-9]{8}/', $lines[0])){
                    foreach ($lines as $key => $value) {
                        $champs[$key] = $value;
                        $stmt->bindParam( $key+1, $champs[$key] );
                    }
                }
                    try{
                        $stmt->execute();
                    }catch(Exception $e){
                        $erreur++;
                }
        }

        fclose($fichier);

        if($erreur == 0){
            Session::flash('message','Mise à jour réussi !');
        }else{
            Session::flash('message','Mise à jour réussi. Il y a eu '.$erreur.' erreur(s) durant le transfert !');
        }
        Session::flash('class','alert alert-success');
        return Redirect::to('compte/dashboard/importfi');
    }
}
