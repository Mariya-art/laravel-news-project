<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public static $availableFields = [
        'id', 'title', 'slug', 'status', 'description', 'fulltext'
    ];

    protected $table = 'news';
    
    protected $fillable = [
        'category_id',
        'source_id',
        'title', 
        'slug', 
        'description', 
        'fulltext', 
        'status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    /*
    protected $guarded = [ // зеркальный вариант $fillable (все, кроме id)
        'id'
    ];
    */

    /*
    public function getTitleAttribute($value) // можно добавить accessor (например, вывести title прописными буквами)
    {
        return mb_strtoupper($value);
    }
    */

    /*
    protected $casts = [ // с помощью мутатора можно преобразовать, например, вывод display как boolean-тип
        'display' => 'boolean'
    ];
    */
}