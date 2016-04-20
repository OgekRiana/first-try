<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
        $users = array (
            0 =>
                array (
                    'password' => Hash::make('ogekrianamd'),
                    'first_name' => 'ogek',
					'last_name' => 'riana',
					'gender' => '1',
					'status' => '3',
                ),
            1 =>
                array (
                    'password' => Hash::make('ogekrianamd'),
                    'first_name' => 'ogek',
					'last_name' => 'user',
					'gender' => '1',
					'status' => '3',
                )    
        );

        DB::beginTransaction();
        try {
            foreach($users as $a)
            {
                User::create([
                    'password' => trim($a['password']),
                    'first_name' => trim($a['first_name']),
                    'last_name' => trim($a['last_name']),
                    'gender' => trim($a['gender']),
                    'status' => trim($a['status'])
                ]);
            }
            DB::commit();

            $this->command->info('users table seeded');
        }
        catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
	}

}