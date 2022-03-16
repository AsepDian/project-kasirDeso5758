<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('index','dataUser','add','hapus','edit','update');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function hapus($id){
        $hapus = user::where('id', $id)->delete();
        if ($hapus){
            return redirect('dataUser');
        }else{
            Log::alert("data gagal dihapus");
        }
    }

    public function edit($id){
        $baris = user::where('id', $id)->first();
        $data = ([
            'id' => $baris->id,
            'nama' => $baris->nama,
            'email' => $baris->email,
            'password' => Hash::make($baris['password']),
            'level' => $baris->level,
            'tombol' => 'Edit',
            'action' => url('edit', ['id' => $id])
        ]);
        return view('admin.inputUser')->with($data);
    }
    public function update($id){
        $user = user::where('id', $id)->first();
        $data = ([
            'nama' => request()->nama,
            'email' => request()->email,
            'password' => Hash::make(request()['password']),
            'level' => request()->level
        ]);
        $user->update($data);
        return redirect('dataUser');
    }
}
