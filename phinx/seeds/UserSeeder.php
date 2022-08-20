<?php

use Faker\Factory as Factory;
use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $faker = Factory::create();

        $data = [];
        for ($i=0; $i<25; $i++) :
            $data[] = [
                'uuid'  => $faker->uuid,
                'username' => $faker->companyEmail,
                'name' => $faker->name,
                'password' => 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', # md5("admin")
                'last_login' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ];
        endfor;

        $users = $this->table('users');
        $users->truncate();
        $users
            ->insert($data)
            ->saveData()
        ;
    }
}
