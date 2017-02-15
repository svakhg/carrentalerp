<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name',  'email', 'password', 'is_active', 'primary_address', 'secondary_address',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id')->using('App\UserRole');
    }
    
    /**
     * Get the city in which user is located
     */
    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }
    
    /**
     * Get the state in which user is located
     */
    public function state()
    {
        return $this->city()->state();
    }
    
    /**
     * Get the country in which user is located
     */
    public function country()
    {
        return $this->city()->state()->country();
    }
    
    /**
     * Get all of the users photos.
     */
    public function photos()
    {
        return $this->morphMany('App\Photo', 'taggable');
    }
    
    /**
     * Get the status in which user is located
     */
    public function status()
    {
        return $this->belongsTo('App\UserStatus', 'status', 'id');
    }
}