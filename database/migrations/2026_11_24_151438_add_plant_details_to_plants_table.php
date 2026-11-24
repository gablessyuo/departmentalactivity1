<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->string('plant_name');
            $table->string('category');
            $table->decimal('unit_price', 10, 2);
            $table->text('description')->nullable();
            $table->string('stock_status')->default('in_stock');
        });
    }

    public function down(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropColumn([
                'plant_name',
                'category',
                'unit_price',
                'description',
                'stock_status',
            ]);
        });
    }
};
