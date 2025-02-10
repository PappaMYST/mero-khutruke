<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'account_id', 'type', 'category_id', 'amount', 'date', 'note', 'to_account_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function toAccount()
    {
        return $this->belongsTo(Account::class, 'to_account_id');
    }
}
