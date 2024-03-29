<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use HasRoles;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


         // User Active Show
         public function UserOnline(){
            return Cache::has('user-is-online' . $this->id);
        }




// * INSERTED CODE

        public static function getpermissionGroups(){

            $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
            return $permission_groups;
        } // End Method


        public static function getpermissionByGroupName($group_name){
            $permissions = DB::table('permissions')
                            ->select('name','id')
                            ->where('group_name',$group_name)
                            ->get();
            return $permissions;
        }// End Method


        public static function roleHasPermissions($role,$permissions){

            $hasPermission = true;
            foreach($permissions as $permission){
                if (!$role->hasPermissionTo($permission->name)) {
                    $hasPermission = false;
                    return $hasPermission;
                }
                return $hasPermission;
            }

        }// End Method

// * INSERTED CODE


}
