<?php
	
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Users;

class UsersTableSeeder extends Seeder {
	public function run(){
		DB::table('users')->delete();
		Users::create([
			'username'=>'seisyo1234',
			'password'=>Hash::make('12345678'),
			'mail'=>'seisyo1234@gmail.com',
			'birthday'=>'1995-02-02'
		]);

	}
}
