<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImg extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function newspost(){
        return $this->belongsTo(NewsPost::class,'news_id','id');
    }

}
