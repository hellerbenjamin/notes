<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Note extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'title',
        'note'
    ];


    /**
     * @var array
     */
    protected $casts = [
        'user_id', 'integer',
        'title' => 'string',
        'note' => 'string',
    ];
}
