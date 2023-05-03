<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class RolesService
{
    public static function getRoles(string $username){

        $roles_raw = DB::table('luckperms_players')
            ->join('luckperms_user_permissions', 'luckperms_players.uuid', '=', 'luckperms_user_permissions.uuid')
            ->where('username', $username)
            ->select('permission')
            ->get();

        $roles = $roles_raw->map(function($role){
            return $role->permission;
        })->toArray();
        return $roles;
    }
}
