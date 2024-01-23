<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLinkModel extends Model
{
    use HasFactory;

    protected $table = 'short_link';
    protected $fillable = [
        'original_url',
        'hash',
    ];
}
