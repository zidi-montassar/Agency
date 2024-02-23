<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Boolean;
use PhpParser\Node\Expr\Cast\Bool_;

class property extends Model
{
    use HasFactory;

    use SoftDeletes; 

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

    public function scopeAvailable(Builder $builder, Bool $available = true): Builder
    {
        return $builder->where('sold', !$available);
    }

    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }
    
}
