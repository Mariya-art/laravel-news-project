<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories(): array
    {
        return DB::table($this->table)
            ->select(['id', 'name', 'rus_name'])
            ->get()
            ->toArray(); // метод get() вернет коллекцию, а мы ждем массив, поэтому используем toArray()
    }

    public function getCategoryById(int $id)
    {
        return DB::table($this->table)->find($id);
    }
}
