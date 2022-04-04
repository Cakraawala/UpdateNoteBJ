<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'update';

    public function features(){
        return $this->hasMany(Features::class, 'features_id');
    }

}
