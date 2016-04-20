<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class RoleTableSeeder extends Seeder {

	public function run()
	{
		$roles = array (
			0 => array (
				'role' => 'administrator',
			),
			1 => array (
				'role' => 'support',
			),
			2 => array (
				'role' => 'user',
			)
		);

		DB::beginTransaction();
		try {
			foreach($roles as $a)
			{
				Role::create([
					'role' => trim($a['role'])
				]);
			}
			DB::commit();

			$this->command->info('roles_table_seeded');
		} catch (\Exception $e) {
			DB::rollBack();
			throw $e;
			
		}		
	}

}