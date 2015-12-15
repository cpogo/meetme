<?php
use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use \Hash;
use \DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
          DB::table('users')->insert( array(
             'full_name'=> $faker->unique()->name,
             'username'=> $faker->firstName,
             'email'=> $faker->email,
             'password'=>Hash::make('123456')
          ));
        }

    }
}
