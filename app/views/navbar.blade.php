    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{ HTML::link('/','FI et annuaire', array('class'=>'navbar-brand')) }}
        </div>
        <div class="navbar-collapse collapse">
          <div class="navbar-form navbar-left">
              {{ Form::text('recherche','',array( 'id'          =>'recherche',
                                                  'class'       =>'form-control',
                                                  'autofocus'   =>'on',
                                                  'autocomplete'=>'off',
                                                  'placeholder' =>'Recherche...'
                                                  )) }}
          </div>
          {{ HTML::link('equipe/1', 'Electricien', array('type'=>'button', 'class'=>'btn btn-success btnEquipe')) }}
          {{ HTML::link('equipe/2', 'Mécanique', array('type'=>'button', 'class'=>'btn btn-primary btnEquipe')) }}
          {{ HTML::link('equipe/3', 'Moyens généraux', array('type'=>'button', 'class'=>'btn btn-info btnEquipe')) }}
          {{ HTML::link('equipe/4', 'Sous Traitants', array('type'=>'button', 'class'=>'btn btn-warning btnEquipe')) }}
         <div class="navbar-right dateMiseJour">
            Mis à jour le {{ substr( $dateMiseJour->date, 0, 10) }}
            @if(Auth::check())
              <p>{{HTML::link('compte/dashboard','Bienvenue, '.Auth::User()->nom)}} / {{HTML::link('users/logout','Se déconnecter')}} </p>
            @else
              <p>{{HTML::link('users/login','Login')}} / {{HTML::link('users/login/register','Enregistrement')}}</p>
            @endif
         </div>
        </div>
      </div>
    </div>