<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteLocation extends Model
{
    use HasFactory;
    protected $table = 'favoritelocations';
    protected $fillable = [
        'user_id',
        'query',
        'name',
        'region',
        'country',
        'lat',
        'lon',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
