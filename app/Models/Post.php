<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    // public function scopeNonActive($query) {
    //     return $query->where('active', false);
    // }

    // public function scopeActive($query) {
    //     return $query->where('active', true);
    // }
        // ? ini di satuin
    public function scopeStatus($query, $bool) {
        return $query->where('active', $bool);
    }



    public static function boot() {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title);
        });
    }




        public function scopeSelectedById($query, $id) {
        return $query->where('id', $id);
    }


}
