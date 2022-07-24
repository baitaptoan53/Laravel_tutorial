<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class student extends Model
{
    use HasFactory;

    // public function getFullName()
    // {
    //     return $this->fist_name  . ' ' . $this->last_name;
    // }
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['fist_name'] . ' ' .  $attributes['last_name']
        );
    }
}
