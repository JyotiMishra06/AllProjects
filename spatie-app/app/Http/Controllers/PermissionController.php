<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

   public function store(Request $request)
   {
      $validatedData = $request->validate(['name' => 'required|string|unique:permissions,name',]);
      $permission = Permission::create(['name' => $validatedData['name']]);
      return response()->json(['message' => 'Permissions created successfully', 'permission' => $permission]);
   }


   public function getPermissions()
   {
      $permission = Permission::all();
      return response()->json($permission);
   }

   public function deletePermissions($id)
   {
      $pernission = Permission::find($id);
      if ($pernission) {
         $pernission->delete();
         return response()->json(['message' => 'Permission deleted successfully.'], 200);
      }
   }
   public function updatePermissions(Request $request, $id)
   {
      $permission = Permission::find($id);
      if (!$permission) {
         return response()->json(['message' => 'Permission not found.'], 404);
      }
      $request->validate([
         'name' => 'required|string|max:255',
      ]);
      $permission->name = $request->input('name');
      $permission->save();
      return response()->json(['message' => 'Permission updated successfully.'], 200);
   }
}
