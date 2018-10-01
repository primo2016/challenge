<?php

namespace App;

use App\Upload;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	// protected $guarded = [];

	protected $fillable = ['title', 'description'];


    protected $dates = ['created_at'];

    public function upload() {
        return $this->hasOne(Upload::class);
    }
}
