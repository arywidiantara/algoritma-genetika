<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc');

        if (!empty($request->searchname))
        {
            $users = $users->where('name', 'LIKE', '%' . $request->searchname . '%');
        }

        if (!empty($request->searchemail))
        {
            $users = $users->where('email', 'LIKE', '%' . $request->searchemail . '%');
        }

        $users = $users->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function create(Request $request)
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'emailuser' => 'unique:users,email|required',
            'password'  => 'required|confirmed',
            'name'      => 'required',
        ]);

        $params = [
            'email'    => $request->input('emailuser'),
            'password' => Hash::make($request->input('password')),
            'name'     => $request->input('name'),
        ];

        $users = User::create($params);

        return redirect()->route('admin.user');
    }

    public function edit($id)
    {
        $users = User::find($id);

        if ($users == null)
        {
            return view('admin.layouts.404');
        }

        return view('admin.user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'emailuser' => 'unique:users,email,' . $id . '|required',
            'password'  => '',
            'name'      => 'required',
        ]);

        $users = User::find($id);

        if (!empty($request->input('password')))
        {
            $users->password = Hash::make($request->input('password'));
        }

        $users->email = $request->input('emailuser');
        $users->name  = $request->input('name');
        $users->save();

        return redirect()->route('admin.user');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.user')->with('success', 'User berhasil dihapus');
    }
}
