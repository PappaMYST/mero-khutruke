<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            $categories = [
                ['name' => 'Salary', 'type' => 'Income'],
                ['name' => 'Allowance', 'type' => 'Income'],
                ['name' => 'Bonus', 'type' => 'Income'],
                ['name' => 'Other', 'type' => 'Income'],
                ['name' => 'Food', 'type' => 'Expense'],
                ['name' => 'Transportation', 'type' => 'Expense'],
                ['name' => 'Beauty', 'type' => 'Expense'],
                ['name' => 'Education', 'type' => 'Expense'],
                ['name' => 'Health', 'type' => 'Expense'],
                ['name' => 'Gift', 'type' => 'Expense'],
                ['name' => 'Accessories', 'type' => 'Expense'],
                ['name' => 'Household', 'type' => 'Expense'],
                ['name' => 'Vehicle', 'type' => 'Expense'],
                ['name' => 'Other', 'type' => 'Expense'],
            ];

            foreach ($categories as $category) {
                Category::Create([
                    'name' => $category['name'],
                    'type' => $category['type'],
                    'user_id' => $user->id
                ]);
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
