<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User as Model;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Model::latest()->paginate(10);
        $data['models'] = $models;
        return view('user_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Model();
        $data['model'] = $model;
        $data['method'] = 'POST';
        $data['route'] = 'user.store';
        $data['namaTombol'] = 'Simpan';
        return view('user_form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $model = new Model();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->save();
        flash("Data berhasil disimpan");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Model::findOrFail($id);
        $data['model'] = $model;
        $data['method'] = 'PUT';
        $data['route'] = ['user.update', $id];
        $data['namaTombol'] = 'Update';
        return view('user_form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed',
        ]);
        $model = Model::findOrFail($id);
        $model->name = $request->name;
        $model->email = $request->email;
        if ($request->password) {
            $model->password = bcrypt($request->password);
        }
        $model->save();
        flash("Data berhasil diupdate");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if ($id == 1) {
            flash("Admin tidak dapat dihapus")->error();
            return back();
        }
        $model = Model::find($id);
        $model->delete();
        flash("Data berhasil dihapus");
        return back();
    }
}
