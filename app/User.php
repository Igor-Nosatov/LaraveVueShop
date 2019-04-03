<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Laravel\Passport\HasApiTokens;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable
    {
        use Notifiable, HasApiTokens;

        protected $fillable = [
            'name', 'email', 'password'
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
    }
