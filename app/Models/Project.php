<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

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

    // Accessor che restituisce la path dell'immagine completa
    protected function immagine(): Attribute {
        return Attribute::make(
            get: fn(string|null $value) => $value ? asset('storage/' . $value) : null,
        );
    }

    // Accessor che modifica il nome tutto in maiuscolo
    protected function nome(): Attribute {
        return Attribute::make(
            get: fn(string $value) => strtoupper($value),
        );
    }

    // Accessor che modifica il formato della data 'Y-m-d' in 'd-m-Y'
    // protected function dataDiCreazione(): Attribute{
    //     return Attribute::make(
    //         get: fn(string $value) => date('d-m-Y',strtotime($value)),
    //     );
    // }
}
