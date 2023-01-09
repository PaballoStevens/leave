<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('Leavetype');
            $table->string('ToDate');
            $table->string('FromDate');
            $table->longtext('Description');
            $table->timestamps();
            $table->longtext('AdminRemark')->nullable();
            $table->string('AdminRemarkDate')->nullable();
            $table->tinyInteger('Status')->default('0');
            $table->string('empid');
            $table->integer('num_days');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
};
