<div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
    <h3 class="alert {{ ( $fiche->termine == 'Oui' || $fiche->termine == 'Annulée') ? 'success alert-success' : 'danger alert-danger' }}">FI : {{ $fiche->numFiche }}</h3>
    <hr>

    <strong>Demandeur</strong>
    <p>{{$fiche->demandeur}} le {{substr($fiche->date,0,10)}} </p>

    <strong>Problème
    @if($fiche->renvoieFiche) : renvoie de la fiche {{$fiche->renvoieFiche}} @endif
    </strong>
    <p>{{$fiche->probleme}}</p>

    @if($fiche->solution)<strong>Solution</strong><p>{{$fiche->solution}}</p> @endif

    @if($fiche->affecteA)<strong>Affecté à</strong><p>{{$fiche->affecteA}}</p> @endif

    <strong>Localisation</strong>
    <p>{{$fiche->zone}} <span class="glyphicon glyphicon-chevron-right"></span> {{$fiche->niveau}} <span class="glyphicon glyphicon-chevron-right"></span> {{$fiche->localisation}} </p>

    @if($fiche->termine)<strong>Terminé</strong><p>{{$fiche->termine}}</p> @endif
    @if($fiche->etatFiche)<strong>Etat</strong><p>{{$fiche->etatFiche}}</p> @endif

    </div>
</div>