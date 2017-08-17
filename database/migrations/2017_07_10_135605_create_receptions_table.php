<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sourceDate');
            $table->integer('nbrPage')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('document_id')->unsigned();
            $table->timestamp('date_scan')->nullable();
            $table->boolean('scanned')->default(false);
            $table->string('user_scan')->nullable();
            $table->timestamp('date_ocr')->nullable();
            $table->boolean('ocr')->default(false);
            $table->string('user_ocr')->nullable();
            $table->timestamp('date_import')->nullable();
            $table->boolean('imported')->default(false);
            $table->string('user_import')->nullable();
            $table->timestamp('date_clipping')->nullable();
            $table->boolean('clipped')->default(false);
            $table->string('user_clipping')->nullable();
            $table->string('nbrArtTotal')->nullable();
            $table->string('time')->nullable();
            $table->timestamp('date_export')->nullable();
            $table->boolean('exported')->default(false);
            $table->string('user_export')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('receptions');
    }
}
