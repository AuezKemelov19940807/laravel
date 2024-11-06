<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogCategoryTable extends Migration
{
    /**
     * Выполнить миграцию.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalog_id')       // Внешний ключ на таблицу catalogs
            ->constrained()                  // Указывает на таблицу catalogs
            ->onDelete('cascade');           // Если каталог удален, удаляются и связи
            $table->foreignId('category_id')      // Внешний ключ на таблицу categories
            ->constrained()                  // Указывает на таблицу categories
            ->onDelete('cascade');           // Если категория удалена, удаляются и связи
            $table->timestamps();                // Время создания и обновления записи
        });
    }

    /**
     * Отменить миграцию.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_category');
    }
}
