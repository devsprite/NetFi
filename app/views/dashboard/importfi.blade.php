@extends('dashboard.default')

@section('contenu')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Import du fichier des fiches d'intervention</h1>
        @if(Session::has('message'))
            <div class="{{Session::get('class')}}">
                {{Session::get('message')}}
            </div>
        @endif
        {{Form::open(array('url'=>'compte/dashboard/importfi', 'files'=>'true', 'class'=>'form-group'))}}
            {{Form::label('csvFI', 'Veuillez choisir un fichier')}}
            {{Form::file('csvFI')}}
            {{Form::submit('Envoyer', array('class'=>'btn btn-default submit'))}}
        {{Form::close()}}
        </div>
@stop