<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tipouser;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

      
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function create()
    {
        $user = new User();
        $tipou = Tipouser::pluck('nombre_tipou','id');
        return view('user.create', compact('user','tipou'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
   

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'rol' => 'required',
            'email' => 'required',
            'password' => 'required'             
        ]);       
        
        $data = $request->except('confirm-password', 'password');
        $data['password'] = Hash::make($request->password);
        User::create($data);        
        return redirect()->route('login')
        ->with('success', 'Usuario creado');;
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = User::find($id);
        $tipou = Tipouser::pluck('nombre_tipou','id');
        return view('user.edit', compact('user','tipou'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'Usuario Actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado');
    }

    public function exportallusers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
