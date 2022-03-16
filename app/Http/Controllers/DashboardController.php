<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Users;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['user'] = Users::count();
        $data['kategori'] = Kategori::count();
        $data['menu'] = Menu::count();

        return view('admin.dashboard', $data);
    }
}
