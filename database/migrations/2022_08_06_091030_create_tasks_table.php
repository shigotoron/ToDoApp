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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // 追記ここから
            $table->unsignedBigInteger('user_id'); // 'user_id' という名前のカラムを作成します
            $table->string('title'); // 'title' という名前のカラムを作成します
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); // タスクが作成された日時をあらわすカラム
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP')); // タスクが更新された日時をあらわすカラム
            // 追記ここまで
            // $table->timestamps(); この行はコメントアウトまたは削除します
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};