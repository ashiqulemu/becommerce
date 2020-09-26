<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =Faker::create();
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'username'=>'admin',
            'role'=>'admin',
            'credit_balance'=>5000,
            'password'=>bcrypt(123123),
        ]);
        DB::table('users')->insert([
            'name'=>'Admin2',
            'email'=>'admin2@admin.com',
            'username'=>'admin2',
            'role'=>'admin',
            'credit_balance'=>5000,
            'password'=>bcrypt('@admin123132'),
        ]);
        DB::table('users')->insert([
            'name'=>'Admin3',
            'email'=>'admin3@admin.com',
            'username'=>'admin3',
            'role'=>'admin',
            'credit_balance'=>5000,
            'password'=>bcrypt('@admin123132'),
        ]);
        DB::table('users')->insert([
            'name'=>'Admin4',
            'email'=>'admin4@admin.com',
            'username'=>'admin4',
            'role'=>'admin',
            'credit_balance'=>5000,
            'password'=>bcrypt('@admin123132'),
        ]);

        foreach (range(1,15) as $index){
            DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=>$faker->email,
                'username'=>'user'.$index,
                'role'=>'user',
                'credit_balance'=>$faker->numberBetween(2000,10000),
                'password'=>bcrypt(123123),
            ]);
        }
        \App\Setting::create([
            'amount_sign' => '',
            'sign_up_credit' => 10,
            'referral_get_credit' => 10,
            'paypal_id' => 'AZCNwUemHVI2rzkR6R39pdAjep1Tjpi1TEktP1hIDOJZk2jzBjqoTMcp0WmdNqYCRvSpha0nvjYK4pjT',
            'paypal_secret' => 'EEtkxKxtfBV30bcmXBEFu1V3ddzyrqrxoGSeTTP91a85CjrXxwW4vIGctkZxeJVyj9K83-EVkHF47xR8',
            'ssl_id' => 'billb5de546274c7a5',
            'ssl_secret' => 'billb5de546274c7a5@ssl',
            'sending_email_address' => env('SEND_MAIL_ADDRESS'),
            'admin_email_address' =>env('ADMIN_MAIL_ADDRESS'),
        ]);
    }
}
