<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function kategori(){
       return $this->belongsTo(Kategori::class, 'kategori_id','id');
    }
    use HasFactory;
}
