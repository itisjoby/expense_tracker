<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expenses';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'amount',
        'description',
        'date',
        'status'
    ];

   
}
