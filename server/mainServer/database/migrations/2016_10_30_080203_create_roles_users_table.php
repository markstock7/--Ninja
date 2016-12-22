<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('projects_users', function (Blueprint $table) {
            $table->increments('id');

            /**
             * 创建者的id
             */
            $table->integer('user_id');

            /**
             * 所在项目的id
             */
            $table->integer('project_id');

            /**
             * 对当前项目的权限
             */
            $table->integer('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
