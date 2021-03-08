<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->foreignId('admin')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('pelanggan_id')->constrained('pelanggan')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('barang_id')->constrained('barang')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('jenis_pembayaran',['cash','kredit']);
            $table->date('tanggal_transaksi');
            $table->bigInteger('qty');
            $table->bigInteger('total_harga');
            $table->bigInteger('dibayar')->nullable();
            $table->bigInteger('sisa')->nullable();
            $table->text('keterangan')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();

            $table->primary('id');
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
        Schema::dropIfExists('transaksi');
    }
}
