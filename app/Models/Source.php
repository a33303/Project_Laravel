<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $table = 'source';

    protected $fillable = [
        'name_source',
        'link'
    ];

    public function getSourceById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}
