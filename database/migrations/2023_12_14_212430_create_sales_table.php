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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->decimal('amount', 8, 2);
            $table->timestamps();
            
            $table->foreign('product_id')
            ->references('id')->on('products')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
