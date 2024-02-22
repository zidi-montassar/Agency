<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class property extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'description',
            'surface',
            'rooms',
            'bedrooms',
            'floor',
            'price',
            'city',
            'adress',
            'postal_code',
            'sold'
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function slug(): string
    {
        return Str::slug($this->title);
    }
}
