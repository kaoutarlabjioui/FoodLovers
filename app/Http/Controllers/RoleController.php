<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Services\IRoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected IRoleService $iRoleservice;

    public function __construct(IRoleService $iRoleService)
    {
        $this->iRoleservice = $iRoleService;
    }

    public function index(){

        $roles= $this->iRoleservice->getAll();
        return view('admin.adminroles', compact('roles'));
    }

    public function store(StoreRoleRequest $request){
        $this->iRoleservice->store($request->validated());
        return redirect('admin/roles')->with('success', 'Role ajoute');
    }

    public function edite (Role $role){
        return view('admin.roleedit',compact('role'));
    }
    public function update( UpdateRoleRequest $request,$role){
        $this->iRoleservice->update($role,$request->validated());
        return redirect('admin/roles')->with('success', 'Role mis a jour');
    }

    public function destroy($role){

        $this->iRoleservice->delete($role);
        return redirect('admin/roles')->with('success', 'Rôle supprimé');
    }
}
