<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cidade',
        'uf',
        'logradouro',
        'bairro',
        'cep',
        'ddd'
    ];

    // Validation Rules

    /**
     * The attributes validation rules.
     *
     * @var array
     */
    public $rules = [
        'cidade' => 'required|string|min:3|max:127',
        'uf' => 'required|string|min:2|max:2',
        'logradouro' => 'required|string|min:3|max:255',
        'bairro' => 'required|string|min:3|max:127',
        'cep' => 'required|string|min:8|max:8',
        'ddd' => 'required|numeric|max:2',
    ];

    // Accessors & Mutators

    public function cep(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => preg_replace('~.{3}$~', '-', $value) . substr($value, 5),
            set: fn ($value) => (int) preg_replace('/\D/', '', $value),
        );
    }

    public function uf(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtolower($value),
        );
    }

    public function cidade(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => lcfirst($value),
        );
    }
}
