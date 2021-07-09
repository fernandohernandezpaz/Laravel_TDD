<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cards extends Model
{
	use HasFactory;
	protected $table = 'cards';
	protected $primaryKey = 'id';
	protected $guarded = ['id'];
	protected $hidden = ['created_at', 'updated_at'];
	protected $cast = [
		'active' => 'boolean'
	];
	protected $imgDirectory = '/cards';

	/* Accessors */
	public function getImgUrlAttribute() 
	{
		return Storage::disk('public')
			->url($this->imagen);
	}

	/* Functions */
	public function uploadImage($image) 
	{
		return Storage::disk('public')
			->putFile($this->imgDirectory, $image);
	}
}
