<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('slug')->nullable()->unique();
            $table->foreignId('kategori_id')->constrained('kategori')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('merk');
            $table->date('tanggal_beli');
            $table->bigInteger('harga_beli');
            $table->bigInteger('harga_jual_cash');
            $table->bigInteger('laba_cash');
            $table->bigInteger('harga_jual_kredit');
            $table->bigInteger('laba_kredit');
            $table->integer('ram')->nullable();
            $table->integer('memori')->nullable();
            $table->string('gambar')->nullable();
            $table->text('deskripsi')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
