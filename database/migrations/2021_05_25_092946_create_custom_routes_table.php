<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_routes', function (Blueprint $table) {
            $table->id();
            $table->string('request_type')->nullable();
            $table->string('group_url')->nullable();
            $table->string('url')->unique()->nullable();
            $table->string('controller_name')->nullable();
            $table->string('function_name')->unique()->nullable();
            $table->string('route_name')->unique()->nullable();
            $table->string('route_show')->nullable();
            $table->string('menu')->nullable();
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
        Schema::dropIfExists('custom_routes');
    }
}
