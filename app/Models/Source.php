<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    public $timestamp = false;

    protected $table = 'source';

    protected $fillable = [
        'name_source',
        'link'
    ];


}
