<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    use HasFactory;

    protected $fillable = [
        'funds_manager_id',
        'name',
        'start_year'
     ];

    public function fundsManager() {
        return $this->belongsTo(FundsManager::class);
    }
    public function aliases() {
        return $this->hasMany(Alias::class);
    }
    public function companies() {
        return $this->belongsToMany(Company::class, 'funds_companies');
    }
}
