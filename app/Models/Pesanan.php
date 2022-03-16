<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $guarded = ['id'];
    public $timestamps = false;
    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_id','id');
     }
    use HasFactory;
}
