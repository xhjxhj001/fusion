<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLsrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable(false); // primary key
            $table->string('name', 255)
                ->nullable(false)
                ->default('')
                ->comment('the name of the item'); // item name
            $table->string('description', 1000)
                ->nullable(false)
                ->default('')
                ->comment('the description of the item');
            $table->string('image', 1000)
                ->nullable(false)
                ->default('the image url of the item');
            $table->TinyInteger('status')
                ->nullable(false)
                ->default(0)
                ->comment('-1: deleted 0: offline 1: online 2: recommend');
            $table->decimal('price', 8, 2)
                ->nullable(false)
                ->default(0.00)
                ->comment('the price of the item');
            $this->creators($table);
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
        Schema::dropIfExists('item');
    }

    /**
     * set create or update operator's column
     * @param Blueprint $table
     */
    private function creators(Blueprint $table)
    {
        $table->string('created_by', 255)
            ->nullable(false)
            ->default('')
            ->comment('the operator of creation');
        $table->string('updated_by', 255)
            ->nullable(false)
            ->default('')
            ->comment('the operator of updating');
    }
}
