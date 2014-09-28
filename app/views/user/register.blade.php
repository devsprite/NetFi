@extends('default')

@section('contenu')
<div class="container-fluid">
    <div class="row">
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
    <h1>Enregistrement</h1>
    <!-- Fenetre modale -->
        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div id="myModalTel" class="modal-content">
                </div>
            </div>
        </div>
    <!-- Fenetre modale -->
    <div id="valret"></div>
    {{Form::open(array('url'=>'users/login/register'))}}
    <div class="form-group col-lg-3 col-md-4 col-sm-5 col-xs-11 ">
        @if (Session::has('message'))
            <div class="{{ Session::get('class') }}">
                {{ Session::get('message') }}
            </div>
        @endif
        <p>
        {{Form::label('nom', 'Nom')}}
        {{Form::input('text', 'nom', '', array('placeholder'=>'Nom', 'class'=>'form-control'))}}
        </p>
        @if ($errors->has('nom'))
            {{$errors->first('nom','<p class="alert alert-danger">:message</p>')}}
        @endif

        <p>
        {{Form::label('email', 'Email')}}
        {{Form::input('text', 'email', '', array('placeholder'=>'Email', 'class'=>'form-control'))}}
        </p>
        @if ($errors->has('email'))
            {{$errors->first('email','<p class="alert alert-danger">:message</p>')}}
        @endif

        <p>
        {{Form::label('password', 'Mot de passe')}}
        {{Form::input('password', 'password', '', array('placeholder'=>'Mot de passe', 'class'=>'form-control'))}}
        </p>
        @if ($errors->has('password'))
            {{$errors->first('password','<p class="alert alert-danger">:message</p>')}}
        @endif

        <p>
        {{Form::label('password', 'Confirmer votre mot de passe')}}
        {{Form::input('password', 'password_confirmation', '', array('placeholder'=>'Confirmer votre mot de passe', 'class'=>'form-control'))}}
        </p>

        {{Form::submit('Envoyer', array('class'=>'btn btn-default submit'))}}
    </div>
    {{Form::close()}}
    </div>
    </div>
</div>
@stop