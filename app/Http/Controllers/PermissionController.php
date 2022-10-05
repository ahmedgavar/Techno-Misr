<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::orderBy('id', 'desc')->get();
        return view('dashboard.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Permission $permission)
    {
        //
        try {
            $permission->name = $request->name;
            $permission->description = $request->description;
            $permission->save();
            if ($permission) {
                return redirect()->route('admin.permission.index')->with(['success' => 'تم الحفظ بنجاح']);
            } else {
                return redirect()->route('admin.permission.index')->with(['error' => 'لم يتم الحفظ  ']);
            }
        } catch (Exception $ex) {
            return $ex;
            return redirect()->route('admin.permission.index')->with(['error' => 'لم يتم الحفظ  ']);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $permission = Permission::findORFail($id);
        return view('dashboard.permissions.edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $permission = Permission::findOrFail($id);
            $permission->name = $request->name;
            $permission->description = $request->description;
            $permission->save();
            if ($permission) {
                return redirect()->route('admin.permission.index')->with(['success' => 'تم التحديث بنجاح']);
            } else {
                return redirect()->route('admin.permission.index')->with(['error' => ' حدث خطأ ما']);
            }

        } catch (\Exception$ex) {
            // return message for unhandled exception
            return redirect()->route('admin.permission.index')->with(['error' => ' حدث خطأ ما']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        try
        {
            $permission = Permission::findOrFail($id);
            $permission->delete();
            return redirect()->route('admin.permission.index')->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Exception$ex) {
            // return message for unhandled exception
            return redirect()->route('admin.permission.index')->with(['error' => ' حدث خطأ ما']);
        }

    }
}
