<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $table = 'sources';

    public function getSources(): array
    {
        return DB::table($this->table)
            ->select(['id', 'name', 'real_name', 'site', 'status'])
            ->get()
            ->toArray(); // метод get() вернет коллекцию, а мы ждем массив, поэтому используем toArray()
    }

    public function getSourceById(int $id)
    {
        return DB::table($this->table)->find($id);
    }
}
