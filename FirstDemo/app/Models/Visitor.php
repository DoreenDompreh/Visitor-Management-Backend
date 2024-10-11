<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'full_name',
        'company',
        'designation',
        'phone_number',
        'email',
        'base_64image',
        'number_of_visitors',
        'purpose',
        'is_recurring_visits',
        'start_date',
        'end_date',
        'host_id'
    ];
}
