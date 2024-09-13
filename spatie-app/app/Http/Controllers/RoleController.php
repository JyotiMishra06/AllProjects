<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // Create a new role
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        $role = Role::create(['name' => $validatedData['name']]);

        return response()->json(['message' => 'Role created successfully', 'role' => $role]);
    }
    // get all Roles

    public function getRoles()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function deleteRoles($id)
    {
       
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return response()->json(['message' => 'Role deleted successfully.'], 200);
        }
        return response()->json(['message' => 'Role not found.'], 404);
    }

    public function updateRoles(Request $request, $id)
    {
        $role = Role::find($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found.'], 404);
        }
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $role->name = $request->input('name');
        $role->save();
        return response()->json(['message' => 'Role updated successfully.'], 200);
    }

    public function assignPermissions(Request $request, $roleId)
    {
        // Find the role by its ID
        $role = Role::find($roleId);
    
        // Check if the role exists
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
    
        // Retrieve permissions from the request
        $permissions = $request->input('permissions', []);
    
        // Check if permissions are provided
        if (empty($permissions)) {
            return response()->json(['message' => 'No permissions provided'], 400);
        }
    
        // Assign permissions to the role
        $role->syncPermissions($permissions);
    
        // Return success message
        return response()->json(['message' => 'Permissions assigned successfully']);
    }
    
}
