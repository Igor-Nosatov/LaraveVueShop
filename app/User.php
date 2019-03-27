<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Laravel\Passport\HasApiTokens;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable
    {
        use Notifiable, HasApiTokens;

        protected $fillable = [
            'name', 'email', 'password', 'provider', 'provider_id',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function order()
        {
            return $this->hasMany(Order::class);
        }

        public function cart()
        {
            return $this->hasMany(Cart::class);
        }

        public function roles()
      {
        return $this->belongsToMany(Role::class);
       }

       public function checkRoles($roles)
    {
        if ( ! is_array($roles)) {
            $roles = [$roles];
        }

        if ( ! $this->hasAnyRole($roles)) {
            auth()->logout();
            abort(404);
        }
    }

    public function hasAnyRole($roles): bool
    {
        return (bool) $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role): bool
    {
        return (bool) $this->roles()->where('name', $role)->first();
    }
    }
