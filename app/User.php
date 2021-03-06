<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Laravel\Passport\HasApiTokens;

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
