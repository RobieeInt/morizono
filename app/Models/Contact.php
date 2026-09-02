<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','email','phone','message','source','kpr_meta'];

    protected $casts = [
        'kpr_meta' => 'array',
    ];

    public function scopeFromKprSimulator($query)
    {
        return $query->where('source', 'kpr_simulator');
    }

    public function scopeFromContactForm($query)
    {
        return $query->where('source', 'contact_form');
    }
}
