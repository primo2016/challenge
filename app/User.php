<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    protected $dates = ['created_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relacion con la tabla Roles N:N
    public function roles() {
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    //Relacion con la tabla Files 1:N
    public function files() {
        return $this->hasMany(File::class);
    }

    public function hasRoles(array $roles) {
        foreach ($roles as $role) {

            foreach ($this->roles as $userRole) {

                if ($userRole->name === $role) {
                    return true;
                }
            }
        }
        return false;
    }

    //Mutador para el atributo password
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

}
