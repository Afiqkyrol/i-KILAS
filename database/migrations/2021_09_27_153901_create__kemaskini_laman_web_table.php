<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemaskiniLamanWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemaskini_laman_web', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->string('jabatan');
            $table->string('nokp');
            $table->string('kategori_saluran');
            $table->string('kategori_maklumat');
            $table->string('jenis_pengemaskinian');
            $table->string('tajuk');
            $table->longText('keterangan');
            $table->string('zipdoc');
            $table->string('zipdoc2');
            $table->string('zipdoc3');
            $table->string('zipdoc4');
            $table->string('zipdoc5');
            $table->string('zipdoc6');
            $table->string('from_date');
            $table->string('to_date');
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

    
    public function down()
    {
        Schema::dropIfExists('_kemaskini_laman_web');
    }
}
