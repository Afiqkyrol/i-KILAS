<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemaskiniAduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemaskini_aduan', function (Blueprint $table) {
            $table->id();
            $table->string('no_rujukan');
            $table->string('nama_pengadu');
            $table->string('nokp');
            $table->string('jabatan');
            $table->string('jenis_aduan');
            $table->longText('keterangan_aduan');
            $table->string('zipdoc');
            $table->string('zipdoc2');
            $table->string('zipdoc3');
            $table->string('zipdoc4');
            $table->string('zipdoc5');
            $table->string('zipdoc6');
            $table->string('disemak');
            $table->longText('ulasan_penyelia');
            $table->string('disahkan');
            $table->longText('ulasan_pengarah');
            $table->string('dikemaskini');
            $table->longText('url');
            $table->string('status');
            $table->string('perkara');
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
        Schema::dropIfExists('_kemaskini_aduan');
    }
}
