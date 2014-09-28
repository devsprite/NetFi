<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelephonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('telephones', function($table)
		{
		    $table->increments 	('id');
		    $table->integer 	('numero');
		    $table->string 		('nom');
		    $table->string 		('prenom');
		    $table->string 		('adresseAlveole');
		    $table->string 		('adresseCarteInterface');
		    $table->string 		('adresseEquipement');
		    $table->string 		('typeDePoste');
		    $table->string 		('numeroPosteAssocie');
		    $table->string 		('nomCentreDeFrais');
		    $table->string 		('categorieAccesResPublic');
		    $table->string 		('numeroCategorieExplotationTelephone');
		    $table->string 		('numeroAnneeGroupePoste');
		    $table->string 		('groupeIntervention');
		    $table->string 		('numeroprivee');
		    $table->string 		('adresse');
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
		Schema::drop('telephones');
	}

}
