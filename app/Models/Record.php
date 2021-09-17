<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'save_type',
        'symptom_type'
    ];
    public function comment(){
        return $this->hasOne(Comment::class, 'record_id', 'id');
    }
    public function image(){
        return $this->hasMany(Image::class, 'record_id', 'id');
    }
}
