<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function scopeActive($query) {
        return $query->where('active', true);
    }

        public function scopeSelectedById($query, $id) {
        return $query->where('id', $id);
    }


}
