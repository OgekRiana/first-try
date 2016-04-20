<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class UsersRoleTableSeeder extends Seeder {

	public function run()
	{
		$users_roles = array (
			0 => array (
				'user_id' => 1,
				'role_id' => 1
			),
			1 => array (
				'user_id' => 2,
				'role_id' => 3
			)
		);

		DB::beginTransaction();
		try {
			foreach($users_roles as $a)
			{
				UsersRole::create([
					'user_id' => trim($a['user_id']),
					'role_id' => trim($a['role_id'])
				]);				
			}		

			DB::commit();
			$this->command->info('users_roles_table_seeded');	
		} catch (\Exception $e) {
			DB::rollBack();
			throw $e;
		}
	}

}