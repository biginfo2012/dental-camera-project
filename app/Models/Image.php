<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'record_id',
        'part_type',
        'pos_id',
        'img_url'
    ];

    public function record(){
        return $this->hasOne(Record::class, 'id', 'record_id');
    }
}
