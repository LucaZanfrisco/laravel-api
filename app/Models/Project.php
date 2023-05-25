<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['immagine','slug'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    
    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class)->withTimestamps();
    }

    protected function immagine(): Attribute {
        return Attribute::make(
            get: fn(string|null $value) => $value ? asset('storage/' . $value) : null,
        );
    }
}
