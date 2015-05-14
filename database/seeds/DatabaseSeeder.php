<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Categories;
//use databases\seeds\CatsTableSeeder;
class DatabaseSeeder extends Seeder {

	public function run()
	{
		$this->call('UsersTableSeeder');
		$this->call('CatsTableSeeder');
        $this->command->info('Users table seeded!');
	}
}
// class CatsTableSeeder extends Seeder {
// 	public function run(){
// 		DB::table('categories')->delete();
// 		Categories::create([
// 			'category_name'=>'娛樂',
// 			'user_id'=>1
// 		]);
// 		Categories::create([
// 			'category_name'=>'生活',
// 			'user_id'=>1
// 		]);
// 		Categories::create([
// 			'category_name'=>'八卦',
// 			'user_id'=>1
// 		]);
// 		Categories::create([
// 			'category_name'=>'旅遊',
// 			'user_id'=>1
// 		]);
// 	}
// }