<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
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
             * 登录的账号
             */
            $table->string('email', 150)->unique();


            $table->string('password', 60)->nullable();

            /**
             * 用户默认的状态激活
             */
            $staus->string('status')->nullable()->default('active');


            /**
             * 记住我的token
             */
            $table->rememberToken();

            /**
             * 最后登陆时间
             */
            $table->timestamp('last_login');

            /**
             * create_at, update_at
             */
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
        Schema::dropIfExists('users');
    }
}
