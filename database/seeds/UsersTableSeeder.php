<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        DB::table('users')->insert([
          [
            'name' => 'John Doe',
            'slug' => 'john-doe',
            'email' => 'johndoe@test.com',
            'password' => bcrypt('secret')
          ],
          [
            'name' => 'Jane Doe',
            'slug' => 'jane-doe',
            'email' => 'janedoe@test.com',
            'password' => bcrypt('secret')
          ],
          [
            'name' => 'Peter Doe',
            'slug' => 'peter-doe',
            'email' => 'peterdoe@test.com',
            'password' => bcrypt('secret')
          ]

        ]);
    }
}
