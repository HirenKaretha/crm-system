<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact',
        'address',
        'status',
    ];

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
