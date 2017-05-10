<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_days', function (Blueprint $table) {            
            $table->string('description');
            $table->date('date');
            $table->enum('type',
                [
                    'FERIADO',
                    'LIMITE_SEMESTRE_LETIVO',
                    'SABADO_LETIVO',
                    'DIA_ESCOLAR'
                ]
            )->default('FERIADO');            
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
        Schema::dropIfExists('school_days');
    }
}
