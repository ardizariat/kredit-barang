<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_cash', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin')->constrained('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('transaksi_id');
            $table->string('no_pembayaran')->unique();
            $table->date('tanggal_bayar');
            $table->bigInteger('bayar');
            $table->text('keterangan')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            
            $table->engine = 'InnoDB';
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_cash');
    }
}
