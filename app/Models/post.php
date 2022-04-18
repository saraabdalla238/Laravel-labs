<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'Description',
        'user_id',
        'posted_by',
        'created_at',
    ];
 public function user()
    {
        # code...
        return $this->belongsTo(user::class);
    }
    
}
