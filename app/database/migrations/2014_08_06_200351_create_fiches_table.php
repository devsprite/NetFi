<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fiches', function($table)
		{
		    $table->increments	('id');
		    $table->integer 	('numFiche');
		    $table->string  	('date');
		    $table->integer 	('annee');
		    $table->integer 	('mois');
		    $table->string 		('probleme');
		    $table->string 		('affecteA');
		    $table->string 		('equipe');
		    $table->string 		('tpsPasse');
		    $table->string  	('arrivee');
		    $table->string  	('ecartArrivee');
		    $table->string 		('agentPcts');
		    $table->string 		('demandeur');
		    $table->string 		('service');
		    $table->string 		('poste');
		    $table->string 		('mailDemandeur');
		    $table->string 		('zone');
		    $table->string 		('niveau');
		    $table->string 		('localisation');
		    $table->string 		('codeLoc');
		    $table->string 		('categorie');
		    $table->string 		('typeMateriel');
		    $table->string 		('exploitation');
		    $table->string 		('materiel');
		    $table->string 		('etatEquipement');
		    $table->string  	('debutIndispo');
		    $table->string  	('finIndispo');
		    $table->double 		('dureeIndispo');
		    $table->string 		('catIntervention');
		    $table->string 		('typeIntervention');
		    $table->string 		('niveauIntervention');
		    $table->string 		('pilote');
		    $table->string  	('dateLimite');
		    $table->string 		('notePcts');
		    $table->string 		('etatFiche');
		    $table->string 		('entreprise');
		    $table->string 		('telephone');
		    $table->string 		('termine');
		    $table->string 		('conforme');
		    $table->string 		('solution');
		    $table->string  	('finIntervention');
		    $table->double 		('delaiRealisation');
		    $table->string 		('refacture');
		    $table->string  	('dateCloture');
		    $table->string 		('delaiPrevu');
		    $table->string 		('ecartDelai');
		    $table->string 		('transmisProgrammation');
		    $table->string 		('retourProgrammation');
		    $table->string 		('renvoieFiche');
		    $table->string 		('lienProject');
		    $table->string 		('rapTypeEquipement');
		    $table->string 		('rapDefaut');
		    $table->string 		('reprogrammation');
		    $table->boolean 	('magasin');
		    $table->string 		('dateLimiteProgrammation');
		    $table->string 		('respectDelaiProgrammation');
		    $table->string 		('mailCloture');
		    $table->boolean		('mailProgrammation');
		    $table->boolean		('mailProgramme');
		    $table->string 		('centreFrais');
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fiches');
	}

}
