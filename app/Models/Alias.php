<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    use HasFactory;

    protected $fillable = [
        'fund_id',
        'alias'
    ];

    public function fund() {
        return $this->belongsToMany(Fund::class, 'funds_companies');
    }
}
