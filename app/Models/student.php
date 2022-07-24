<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class student extends Model
{
    use HasFactory;
    //menner 1
    // public function getFullName()
    // {
    //     return $this->fist_name  . ' ' . $this->last_name;
    // }
    //menner 2
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['fist_name'] . ' ' .  $attributes['last_name']
        );
    }

    protected function age(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $age = \Carbon\Carbon::parse($attributes['birthdate'])->diff(\Carbon\Carbon::now())->format('%y');
                return $age;
            },
        );
    }
    protected function gender(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return ($attributes['gender'] == 1 ? 'Male' : 'Female');
            },
        );
    }
}
