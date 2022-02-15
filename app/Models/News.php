<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, Sluggable;

    public static $availableFields = [
        'id', 'title', 'slug', 'status', 'image', 'description', 'fulltext', 'created_at'
    ];

    protected $table = 'news';
    
    protected $fillable = [
        'category_id',
        'source_id',
        'title', 
        'slug', 
        'status',
        'image',
        'description', 
        'fulltext',
        'created_at'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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