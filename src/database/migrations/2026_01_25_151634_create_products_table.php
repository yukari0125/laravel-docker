<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');                // 商品名
            $table->unsignedInteger('price');      // 値段（0〜10000）
            $table->string('image_path');          // 画像ファイルパス
            $table->string('season');              // spring / summer / autumn / winter
            $table->text('description');           // 商品説明（120文字以内）
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
