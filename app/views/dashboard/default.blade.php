<!DOCTYPE html>
<html lang="fr" xml:lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('favicon.ico')}}">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    {{HTML::style('css/bootstrap.min.css')}}
    <!-- Custom styles for this template -->
    {{HTML::style('css/dashboard.css')}}
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{HTML::script('assets/js/ie10-viewport-bug-workaround.js')}}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      {{HTML::script('assets/js/html5shiv.min.js')}}
      {{HTML::script('assets/js/respond.min.js')}}
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Basculer la navigation</os-p></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{HTML::link('/','FI et annuaire', array('class'=>'navbar-brand'))}}
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>{{HTML::link('/compte/dashboard','Tableau de bord')}}</li>
            <li>{{HTML::link('compte/dashboard','Bienvenue, '.Auth::User()->nom)}}</li>
            <li>{{HTML::link('users/logout','Se déconnecter')}}</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
@include('dashboard.menu')
@yield('contenu')

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('js/jquery.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
</body>
</html>
