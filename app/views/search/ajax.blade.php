@if ( $telephones->count() > 0 )

<table id="mytable" class="table table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th>Nom ( {{ $telephones->getTotal() }} résultat{{ ($telephones->getTotal()>1)?'s':''; }} )</th>
            <th>Prénom</th>
            <th>N° de téléphone</th>
            @if(Auth::check())
                <th>Modifier</th>
            @endif
        </tr>
    </thead>
    <tbody>
    @foreach ( $telephones as $telephone )
        <tr class="info" value="{{ $telephone->id }}" table="telephones">
            <td>{{ $telephone->nom }}</td>
            <td>{{ $telephone->prenom }}</td>
            <td>
            @if ($telephone->numeroprivee)
                Portable :
            @else
                Bureau&nbsp;&nbsp;&nbsp;:
            @endif
                <strong>{{ $telephone->numero }}</strong>
            </td>
            @if(Auth::check())
                <td>{{HTML::link('telephones/telephone/'.$telephone->id,'Modifier', array('class'=>'btn btn-primary'))}}</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
@endif

@if( $fiches->count() > 0 )
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
@endif