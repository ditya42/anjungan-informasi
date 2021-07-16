<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToPengaduans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // $table->dropColumn('jabatan');

            $table->unsignedBigInteger('jabatan_id')->nullable();

            $table->index('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->string("jabatan",255)->nullable();



            $table->dropColumn('jabatan_id');

            $table->dropIndex('jabatan_id');
            $table->dropForeign('jabatan_id')->references('id')->on('jabatans')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }
}
