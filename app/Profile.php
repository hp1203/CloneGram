<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage() {
        $imagePath = ($this->image) ? '/storage/'.$this->image : 'https://www.putneyhigh.gdst.net/wp-content/uploads/2018/06/person-placeholder-male-5.jpg';
        return $imagePath;
    }
    public function followers() {
        return $this->belongsToMany(User::class);
    } 
    public function user() {
        return $this->belongsTo(User::class);
    }
}
