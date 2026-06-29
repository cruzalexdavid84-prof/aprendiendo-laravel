<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany; ///
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    /* Esto solo va si deseo ver datos desde ratings, El profe no lo puso ya que solo iba a 
    consultar datos desde movie */
    public function movies(): HasMany
    {
        return $this->hasMany(Movie::class, 'rating_fk', 'rating_id');
    }
};
