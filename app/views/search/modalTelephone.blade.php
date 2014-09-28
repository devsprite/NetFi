<div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
    <h3 class="alert alert-info">{{ $telephone->nom }} {{ $telephone->prenom }} : <strong>{{ $telephone->numero }}</strong></h3>
    <hr>
    @if($telephone->adresseAlveole)         <p><strong>Adresse alvéole :</strong> {{ $telephone->adresseAlveole }}</p> @endif
    @if($telephone->adresseCarteInterface)  <p><strong>Adresse carte interface :</strong> {{ $telephone->adresseCarteInterface }}</p> @endif
    @if($telephone->adresseEquipement)      <p><strong>Adresse equipement :</strong> {{ $telephone->adresseEquipement }}</p> @endif
    @if($telephone->typeDePoste)            <p><strong>Type de poste :</strong> {{ $telephone->typeDePoste }}</p> @endif
    @if($telephone->numeroPosteAssocie)     <p><strong>Poste associé :</strong> {{ $telephone->numeroPosteAssocie }}</p> @endif
    @if($telephone->nomCentreDeFrais)       <p><strong>Centre de Frais :</strong> {{ $telephone->nomCentreDeFrais }}</p> @endif
    </div>
</div>