<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id')->nullable();;
            $table->integer('category_id')->nullable();;
            $table->integer('subcategory_id')->nullable();;
            $table->integer('subsubcategory_id')->nullable();;
            $table->string('product_name_en');
            $table->string('product_name_fil')->nullable();;
            $table->string('product_slug_en');
            $table->string('product_slug_fil')->nullable();
            $table->string('product_code');
            $table->string('product_qty');
            $table->integer('stock')->nullable();
            $table->string('product_tags_en');
            $table->string('product_tags_fil')->nullable();;
            $table->string('product_size_en')->nullable();
            $table->string('product_size_fil')->nullable();
            $table->string('product_color_en')->nullable();
            $table->string('product_color_fil')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('short_descp_en');
            $table->string('short_descp_fil')->nullable();;
            $table->string('long_descp_en');
            $table->string('long_descp_fil')->nullable();;
            $table->string('product_thumbnail');
            $table->string('sale_time')->nullable();
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->string('so_saletime')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
            $table->string('vendor_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
