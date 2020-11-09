<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->string('nama');
            $table->string('company_id');
            $table->string('no_hp', 12)->unique();
            $table->text('photo');
            $table->enum('kehadiran', ['hadir', 'tidak_hadir'])->nullable();
            $table->enum('absensi', ['Masuk', 'Keluar'])->nullable();
            $table->enum('komisi', ['1', '2', '3'])->nullable();
            $table->string('confirm_by')->nullable();
            $table->time('confirm_at')->nullable();
            $table->string('komisi_confirm')->nullable();
            $table->time('komisi_confirm_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('members');
    }
}
