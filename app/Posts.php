<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model{
	protected $table = 'posts';
	protected $guarded = ['id'];

	public function users(){
		return $this->hasOne('App\Users', 'id', 'user_id');
	}
	public function categories(){
		return $this->hasOne('App\Categories', 'id', 'category_id');
	}
}