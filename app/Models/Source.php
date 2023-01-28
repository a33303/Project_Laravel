<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    protected $table = 'source';

    public function getSources(): Collection
    {
        return DB::table($this->table)->select("id", "name_source", "link", "created_at")->get();
        //return DB::select("SELECT id, title, author, status, description, created_at from {$this->table}");
    }

    public function getSourceById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
//        return DB::selectOne("SELECT id, title, author, status, description, created_at from {$this->table} WHERE id = :id", [
//            'id' => $id
//        ]);
    }
}
