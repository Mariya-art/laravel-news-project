<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    protected $fillable = [
        'name', 
        'real_name',
        'site',
        'status'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'source_id', 'id');
    }
}
