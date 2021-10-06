<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'description', 'user_id','product_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
