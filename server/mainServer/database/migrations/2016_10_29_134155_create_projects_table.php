<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            /**
             * 项目的名称，可以重复
             */
            $table->string('name', 150)->nullable();

            /**
             * 项目的别名，应用在url上
             * e.g:
             * xxx.com/propjet/:slug
             */
            $table->string('slug', 150)->nullable()->unique();


            /**
             * 项目的描述
             */
            $table->text('description');

            /**
             * 每个项目有一个唯一的id,用来供client访问
             * 由服务区自动生成，不可改变
             */
            $table->string('project_id', 32)->nullable()->unique();

            /**
             * project_id 所对应的密钥，供client访问
             */
            $table->string('project_secret', 40)->nullable()->unique();


            /**
             * 当前项目的状态
             *
             *  - running 正在运行
             *  - stoping 停止状态
             *
             * 默认为停止状态，当创建完项目后需要手动启动
             * 处于停止状态的项目，不接受任何读写操作
             */
            $table->string('status')->nullable()->default('stoping');


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
        Schema::dropIfExists('projects');
    }
}
