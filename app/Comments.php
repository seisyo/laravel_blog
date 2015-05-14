<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model{
	protected $table = 'comments';
	protected $guarded = ['id'];

	public function users(){
		return $this->hasOne('App\Users', 'id', 'user_id');
	}
}
