<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
	protected $fillable = ['user_id', 'document_id', 'message'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function document()
    {
    	return $this->belongsTo(Document::class);
    }

    public function scan()
    {
    	return $this->hasOne(Scan::class);
    }
}
