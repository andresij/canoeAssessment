<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duplicate extends Model
{
    use HasFactory;

    protected $fillable = [
        'fund_id',
        'funds_manager_id',
        'fund_name',
        'raw_fund_insertion'
     ];

}
