<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'features';

    public function updates(){
        return $this->belongsTo(Update::class, 'note_id', 'id')->where('update_id', 0);
    }
}
