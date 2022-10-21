<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('tel')->nullable();
            $table->integer('notorietyCoeff')->nullable();
            $table->string('complementarySpeciality', 50)->nullable();
            $table->boolean('registeredAppliMeetingOnline')->nullable();
            $table->unsignedBigInteger('sectordistrict_id')->nullable();
            $table->unsignedBigInteger('practitionerstate_id')->nullable();
            $table->timestamps();
            $table->foreign('sectordistrict_id', 'practitioner_ibfk2')->references('id')->on('sectordistricts');
            $table->foreign('practitionerstate_id', 'practitioner_ibfk1')->references('id')->on('practitionerstates');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practitioners');
    }
}
