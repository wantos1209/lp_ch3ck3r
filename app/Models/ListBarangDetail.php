<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ListBarangDetail extends Model
{
    use HasFactory;
    protected $table = 'listbarangdetail';
    protected $fillable = [
        'listbarang_id',
        'area_id',
        'nostt'
    ];
}
