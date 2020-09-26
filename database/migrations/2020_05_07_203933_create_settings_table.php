<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('amount_sign')->nullable();
            $table->float('sign_up_credit')->default(0);
            $table->float('referral_get_credit')->default(0);
            $table->decimal('paypal_con_rate')->default(1);
            $table->decimal('ssl_con_rate')->default(1);
            $table->boolean('show_auction')->default(true);
            $table->string('paypal_id')->nullable();
            $table->string('paypal_secret')->nullable();
            $table->string('ssl_id')->nullable();
            $table->string('ssl_secret')->nullable();
            $table->string('sending_email_address')->default('admin@info.com');
            $table->string('admin_email_address')->default('admin@admin.com');
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
        Schema::dropIfExists('settings');
    }
}
