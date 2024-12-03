<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // 外部キー（categoriesテーブル）
            $table->string('first_name', 255); // 名前（名）
            $table->string('last_name', 255); // 名前（姓）
            $table->tinyInteger('gender'); // 性別
            $table->string('email', 255)->unique(); // メールアドレス（ユニーク制約）
            $table->string('tel', 255); // 電話番号
            $table->string('address', 255); // 住所
            $table->string('building', 255)->nullable(); // 建物名（NULL許容）
            $table->text('detail'); // 詳細
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
