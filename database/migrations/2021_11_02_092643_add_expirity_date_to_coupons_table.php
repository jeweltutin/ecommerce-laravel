<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddExpirityDateToCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->date('expiry_date')->default(DB::raw('CURRENT_DATE'));
            $table->boolean('use_status')->default(0);
            $table->integer('usage_limit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->date('expiry_date')->default(DB::raw('CURRENT_DATE'));
            $table->boolean('use_status')->default(0);
            $table->integer('usage_limit')->nullable();
        });
    }
}
