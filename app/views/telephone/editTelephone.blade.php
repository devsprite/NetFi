@extends('dashboard.default')

@section('contenu')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Édition de la ligne {{ $telephone->numero }}</h1>
        @if(Session::has('message'))
            <div class="{{Session::get('class')}}">
                {{Session::get('message')}}
            </div>
        @endif
{{ Form::model( $telephone, array( 'url' => URL::route( 'telephone.update', $telephone->id ))) }}

    <div class="form-group col-md-6">
        {{ Form::label('nom', 'Nom', ['class' => 'form-label']) }}
        {{ Form::text('nom', null, ['class' => 'form-control']) }}

        {{ Form::label('prenom', 'Prénom', ['class' => 'form-label']) }}
        {{ Form::text('prenom', null, ['class' => 'form-control']) }}

        {{ Form::label('adresseAlveole', 'Adresse alvéole', ['class' => 'form-label']) }}
        {{ Form::text('adresseAlveole', null, ['class' => 'form-control']) }}

        {{ Form::label('adresseCarteInterface', 'Adresse carte interface', ['class' => 'form-label']) }}
        {{ Form::text('adresseCarteInterface', null, ['class' => 'form-control']) }}

        {{ Form::label('adresseEquipement', 'Adresse équipement', ['class' => 'form-label']) }}
        {{ Form::text('adresseEquipement', null, ['class' => 'form-control']) }}

        {{ Form::label('typeDePoste', 'Type de poste', ['class' => 'form-label']) }}
        {{ Form::text('typeDePoste', null, ['class' => 'form-control']) }}

        {{ Form::label('numeroPosteAssocie', 'Numéro de poste associé', ['class' => 'form-label']) }}
        {{ Form::text('numeroPosteAssocie', null, ['class' => 'form-control']) }}

        {{ Form::label('nomCentreDeFrais', 'Nom centre de frais', ['class' => 'form-label']) }}
        {{ Form::text('nomCentreDeFrais', null, ['class' => 'form-control']) }}

        {{ Form::label('categorieAccesResPublic', 'Catégorie accès réseau public', ['class' => 'form-label']) }}
        {{ Form::text('categorieAccesResPublic', null, ['class' => 'form-control']) }}

        {{ Form::label('numeroCategorieExplotationTelephone', 'Numéro catégorie exploitation téléphone', ['class' => 'form-label']) }}
        {{ Form::text('numeroCategorieExplotationTelephone', null, ['class' => 'form-control']) }}

        {{ Form::label('numeroAnneeGroupePoste', 'Numéro année groupe poste', ['class' => 'form-label']) }}
        {{ Form::text('numeroAnneeGroupePoste', null, ['class' => 'form-control']) }}

        {{ Form::label('groupeIntervention', 'Groupe intervention', ['class' => 'form-label']) }}
        {{ Form::text('groupeIntervention', null, ['class' => 'form-control']) }}

        {{ Form::label('numeroprivee', 'Numéro privée', ['class' => 'form-label']) }}
        {{ Form::text('numeroprivee', null, ['class' => 'form-control']) }}

        {{ Form::label('adresse', 'Adresse', ['class' => 'form-label']) }}
        {{ Form::text('adresse', null, ['class' => 'form-control']) }}
<hr>
        {{ Form::submit('Envoyer', ['class'=>'btn btn-primary']) }}

    </div>
{{ Form::close() }}

</div>

@stop
