@extends('default')

@section('contenu')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
    <h1>FI en cours : {{ $equipe }}</h1>
    <!-- Fenetre modale -->
        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div id="myModalTel" class="modal-content">
                </div>
            </div>
        </div>
    <!-- Fenetre modale -->
    <div id="valret">
    @if($fichesEquipe->getTotal()>1)
        <div class="pagination">
            {{ $fichesEquipe->links() }}
        </div>
        <table id="mytableFi" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Probléme ( {{ $fichesEquipe->getTotal() }} résultat{{ ($fichesEquipe->getTotal()>1)?'s':''; }} )</th>
                    <th>Solution</th>
                    <th>FI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fichesEquipe as $ficheEquipe)
                    <tr class="{{ ($ficheEquipe->termine && $ficheEquipe->termine != 'Non') ? 'success alert-success' : 'danger alert-danger' }}" table="fiches" value="{{$ficheEquipe->id}}" >
                        <td>{{ Str::limit($ficheEquipe->date, 5, '') }}</td>
                        <td>{{ $ficheEquipe->probleme }}</td>
                        <td>{{ $ficheEquipe->solution }}</td>
                        <td>{{ $ficheEquipe->numFiche }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>
    </div>
    </div>
</div>
@stop