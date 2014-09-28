@extends('default')

@section('contenu')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
    <h1>FI et annuaire</h1>
    <!-- Fenetre modale -->
        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div id="myModalTel" class="modal-content">
                </div>
            </div>
        </div>
    <!-- Fenetre modale -->
    @if (Session::has('message'))
        <div class="{{ Session::get('class') }}">
            {{ Session::get('message') }}
        </div>
    @endif
    <div id="valret">
        <div class="pagination">
            {{ $fiches->links() }}
        </div>
        <table id="mytableFi" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Probléme ( {{ $fiches->getTotal() }} résultat{{ ($fiches->getTotal()>1)?'s':''; }} )</th>
                    <th>Solution</th>
                    <th>FI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fiches as $fiche)
                    <tr class="{{ ($fiche->termine && $fiche->termine != 'Non') ? 'success alert-success' : 'danger alert-danger' }}" table="fiches" value="{{$fiche->id}}" >
                        <td>{{ Str::limit($fiche->date, 5, '') }}</td>
                        <td>{{ $fiche->probleme }}</td>
                        <td>{{ $fiche->solution }}</td>
                        <td>{{ $fiche->numFiche }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
@stop