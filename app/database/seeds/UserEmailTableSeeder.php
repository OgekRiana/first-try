<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class UserEmailTableSeeder extends Seeder {

	public function run()
	{
		$user_emails = array (
			0 => array (
				'user_id' => 1,
				'address' => 'ogek.riana@gmail.com',
				'token' => '1234567890qrtghnjy6Yjd2784jdkm81'
			),
			1 => array (
				'user_id' => 2,
				'address' => 'rianaogekriana@gmail.com',
				'token' => '1234567890qrtghnjy6Yjd2784kjkm81'	
			)
		);

		DB::beginTransaction();
		try{
			foreach ($user_emails as $a) {
				UserEmail::create([
					'user_id' => trim($a['user_id']),
					'address' => trim($a['address']),
					'token' => trim($a['token']),
				]);
			}
			DB::commit();
            $this->command->info('user_emails table seeded');
		}catch(\Exception $e){
			DB::rollBack();
			throw $e;			
		}
	}

}