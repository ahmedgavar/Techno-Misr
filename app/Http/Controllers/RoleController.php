<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Exception;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->get();
        return view('dashboard.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        $permissions = Permission::pluck('name');
        return view('dashboard.roles.create', ['permissions' => $permissions]);
    }
    public function store(StoreRoleRequest $request, Role $newRole)
    {
        try {
            $newRole->name = $request->name;
            $newRole->permissions = json_encode($request->permissions);
            $newRole->save();
            if ($newRole) {
                return redirect()->route('admin.role.index')->with(['success' => 'تم الحفظ بنجاح']);
            } else {
                return redirect()->route('admin.role.index')->with(['error' => 'لم يتم الحفظ  ']);
            }
        } catch (Exception $ex) {
            return $ex;
            return redirect()->route('admin.role.index')->with(['error' => 'لم يتم الحفظ  ']);

        }
    }
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('dashboard.roles.edit', ['role' => $role, 'permissions' => $permissions]);
    }
    public function update(StoreRoleRequest $request, $id)
    {
        try {
            $newRole = Role::findOrFail($id);
            $newRole->name = $request->name;
            $newRole->permissions = json_encode($request->permissions);
            $newRole->save();
            if ($newRole) {
                return redirect()->route('admin.role.index')->with(['success' => 'تم التحديث بنجاح']);
            } else {
                return redirect()->route('admin.role.index')->with(['error' => 'رساله الخطا']);
            }

        } catch (\Exception$ex) {
            // return message for unhandled exception
            return redirect()->route('admin.roles.index')->with(['error' => 'رساله الخطا']);
        }
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('admin.role.index')->with(['success' => 'تم الحذف بنجاح']);

    }}
