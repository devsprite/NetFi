<?php

class HomeController extends BaseController {
    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */
    //$queries = DB::getQueryLog();

    public function index()
    {
        /*
        * Affiche les infos dans une fenetre modale
        *
        * @table selectionne la table fiches ou telephones
        */
        if(Input::get('table') == 'fiches') {
            $fiche = Fiche::select()->where('id','=',Input::get('id'))->first();
            return View::make('search.modalFiche')->with(array('fiche'=>$fiche));

        }elseif(Input::get('table') == 'telephones'){
            $telephone = Telephone::select()->where('id', '=', Input::get('id'))->first();
            return View::make('search.modalTelephone')->with(array('telephone'=>$telephone));
        }
        /*
        * Si pas de fenetre modale, on affiche la page index par defaut
        *
        */

        $fiches = Fiche::orderBy('id','asc')->paginate(15);
        $dateMiseJour = Fiche::select('date')->first();

        return View::make('home.home')->with(array(
            'fiches'=>$fiches,
            'dateMiseJour'=>$dateMiseJour
        ));
    }

    public function equipe($id = null)
    {
        $dateMiseJour = Fiche::select('date')->first();

        $equipes    = array (
            '1'     =>  '%Electrique%',
            '2'     =>  '%Mécanique/Plomberie/Maintenance%',
            '3'     =>  '%Moyens Généraux/Travaux Neufs%',
            '4'     =>  '%Sous-traitant%'
            );
        $fichesEquipe = Fiche::select()
                                        ->where     ('equipe',      'LIKE', $equipes[$id] )
                                        ->where     ('termine',     '!=',   'Oui')
                                        ->where     ('termine',     '!=',   'Annulée')
                                        ->where     ('etatFiche',   '!=',   'Clôturée')
                                        ->orderBy   ('numFiche', 'desc')
                                        ->paginate  (25);

        return View::make('equipe.equipe')->with(array(
            'fichesEquipe'  =>  $fichesEquipe,
            'dateMiseJour'  =>  $dateMiseJour,
            'equipe'        =>  substr( substr( $equipes[$id], 1), 0, -1)
            ));

    }

    public function searchBack($id = null)
    {
        $pdo = DBPdo::connexPDO();
        if($id == null) exit();
        $search = '%'.$id.'%';
        $retour ="";
//***************************************************************
//          Recherche dans la table telephones
//***************************************************************
        $stmt = $pdo->prepare('SELECT * FROM telephones
                                        WHERE `numero` LIKE :numero
                                        OR `nom` LIKE :nom
                                        OR `prenom` LIKE :prenom
                                        GROUP BY numero
                                        ORDER BY numero ASC LIMIT 15');
        $stmt->bindParam(':numero', $search);
        $stmt->bindParam(':nom', $search);
        $stmt->bindParam(':prenom', $search);
        $stmt->execute();
        if( $stmt->rowCount() > 0 ) {
            $retour .= '
            <table id="mytable" class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th>Nom ('.$stmt->rowCount().')</th>
                        <th>Prénom</th>
                        <th>N° de téléphone</th>
                    </tr>
                </thead>
                <tbody>
                      ';
            while($result = $stmt->fetchObject()) {
                $retour .=   '<tr class="info" table="telephones" value="'.$result->id.'" >
                                <td>'.$result->nom.'</td>
                                <td>'.$result->prenom.'</td>';
                if($result->numeroprivee){
                    $retour .=' <td>Portable : <strong>'.$result->numero.'</strong></td></tr>';
                }else{
                    $retour .=' <td>Bureau&nbsp;&nbsp;&nbsp;: <strong>'.$result->numero.'</strong></td></tr>';
                }
            }
            $retour .='
                </tbody>
            </table>
            ';
        }
//***************************************************************
//          Recherche dans la table fiches
//***************************************************************
        $stmt = $pdo->prepare(' SELECT * FROM fiches
                                WHERE probleme  LIKE :probleme
                                OR numFiche     LIKE :numFiche
                                OR solution     LIKE :solution
                                OR affecteA     LIKE :affecteA
                                OR demandeur    LIKE :demandeur
                                OR zone         LIKE :zone
                                OR niveau       LIKE :niveau
                                OR localisation LIKE :localisation
                                OR typeMateriel LIKE :typeMateriel
                                ORDER BY numFiche
                                DESC LIMIT 100');
            $stmt->bindParam(':probleme', $search);
            $stmt->bindParam(':numFiche', $search);
            $stmt->bindParam(':solution', $search);
            $stmt->bindParam(':affecteA', $search);
            $stmt->bindParam(':demandeur', $search);
            $stmt->bindParam(':zone', $search);
            $stmt->bindParam(':niveau', $search);
            $stmt->bindParam(':localisation', $search);
            $stmt->bindParam(':typeMateriel', $search);

        $stmt->execute();

        if( $stmt->rowCount() > 0 ) {
        $retour .= '
                <table id="mytableFi" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Probléme ('.$stmt->rowCount().')</th>
                            <th>Solution</th>
                            <th>FI</th>
                        </tr>
                    </thead>
                <tbody>
                          ';
        while($result = $stmt->fetchObject()) {
            $etat = ($result->termine && $result->termine != "Non")?"success":"danger";
            $retour .=   '<tr class="'.$etat.'" table="fiches" value="'.$result->id.'">
                            <td>'.substr( $result->date, 0, 6).'</td>
                            <td>'.$result->probleme.'</td>
                            <td>'.$result->solution.'</td>
                            <td>'.$result->numFiche.'</td></tr>';
        }
        $retour .='
              </tbody>
            </table>
        ';
      }
        return $retour;
    }


    // Fonction non utilisé, mise en attente car le delai de retour est trop long
    public function search($id = null){
        $dateMiseJour = Fiche::select('date')->first();
        $fiches = Fiche::select()
                                        ->where     ('probleme',    'LIKE',     '%'.$id.'%')
                                        ->orwhere   ('solution',    'LIKE',     '%'.$id.'%')
                                        ->orwhere   ('numFiche',    'LIKE',     '%'.$id.'%')
                                        ->orwhere   ('affecteA',    'LIKE',     '%'.$id.'%')
                                        ->orwhere   ('demandeur',   'LIKE',     '%'.$id.'%')
                                        ->orwhere   ('zone',        'LIKE',     '%'.$id.'%')
                                        ->orwhere   ('niveau',      'LIKE',     '%'.$id.'%')
                                        ->orwhere   ('localisation','LIKE',     '%'.$id.'%')
                                        ->orwhere   ('typeMateriel','LIKE',     '%'.$id.'%')
                                        ->paginate  (100);
        $telephones = Telephone::select()
                                        ->where     ('numero',      'LIKE',     '%'.$id.'%' )
                                        ->orwhere   ('nom',         'LIKE',     '%'.$id.'%' )
                                        ->orwhere   ('prenom',      'LIKE',     '%'.$id.'%' )
                                        ->orwhere   ('typeDePoste', 'LIKE',     '%'.$id.'%' )
                                        ->groupBy   ('numero')
                                        ->orderBY   ('nom', 'ASC')
                                        ->paginate  (15);

        return View::make('search.ajax')->with(array(
            'fiches'        =>$fiches,
            'telephones'    =>$telephones,
        ));

    }


}
