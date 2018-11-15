<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Repositories\Repository;

class RoleController extends Controller
{

    protected $roleModel;

    public function __construct(Role $roleModel)
    {
        // set the model
        $this->roleModel = new Repository($roleModel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleModel->all();

        return view('admin.role_list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name
        ]);

        return back()->with('success', __('Store successfully !'));
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
        Role::findOrFail($id);

        Role::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return back()->with('success', __('Update Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return back()->with('success', __('Delete successfully !'));
    }

    public function getDataJson()
    {
        $roles = Role::all();

        return $roles;
    }
}
