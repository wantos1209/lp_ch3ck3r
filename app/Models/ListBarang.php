<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ListBarang extends Model
{
    use HasFactory;
    protected $table = 'listbarang';
    protected $fillable = [
        'user_id',
        'nomor'
    ];
}
