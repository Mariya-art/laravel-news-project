<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(): array
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'slug', 'status', 'description', 'fulltext'])
            ->get()
            ->toArray(); // метод get() вернет коллекцию, а мы ждем массив, поэтому используем toArray()
    }

    public function getNewsById(int $id)
    {
        return DB::table($this->table)->find($id);
    }

    public function getNewsByCategoryId(int $id): array
    {
        return DB::select("SELECT `id`, `title`, `slug`, `status`, `description`, `fulltext` FROM {$this->table} 
                            WHERE category_id = :id", ['id' => $id]);
    }
}
