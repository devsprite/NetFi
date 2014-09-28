<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gestionnaire des fiches d'interventions">
    <meta name="author" content="Dominique">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <title>FI et annuaire</title>

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
@include('navbar')
@yield('contenu')
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{HTML::script('js/jquery.min.js')}}
    {{HTML::script('js/bootstrap.min.js')}}
    {{HTML::script('js/requete.js')}}
  </body>
</html>