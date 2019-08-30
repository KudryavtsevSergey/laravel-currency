<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Sun\Currency\CurrencyConfig;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CurrencyConfig::tableCourse(), function (Blueprint $table) {
            $table->unsignedBigInteger('from_currency_id');
            $table->unsignedBigInteger('to_currency_id');
            $table->decimal('coefficient', 9, 5);

            $table->foreign('from_currency_id')
                ->references('id')
                ->on(CurrencyConfig::tableCurrency())
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('to_currency_id')
                ->references('id')
                ->on(CurrencyConfig::tableCurrency())
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['from_currency_id', 'to_currency_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(CurrencyConfig::tableCourse(), function (Blueprint $table) {
            $table->dropForeign('course_from_currency_id_foreign');
            $table->dropForeign('course_to_currency_id_foreign');
        });

        Schema::dropIfExists(CurrencyConfig::tableCourse());
    }
}
