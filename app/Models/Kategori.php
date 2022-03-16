<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function Menu(){
        return $this->hasMany(Menu::class);
    }
    use HasFactory;
}
