<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');

            /**
             * 权限的名称
             */
            $table->string('name', 100)->nullable();

            /**
             * 操作的对象 eg. Document
             */
            $table->string('object_type', 150)->nullable();

            /**
             * 操作对象的类型 eg.Document->read
             */
            $table->string('action_type', 150)->nullable();

            $table->string('description', '200')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }
}
