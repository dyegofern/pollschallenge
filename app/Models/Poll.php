<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{

    public $timestamps = false;

    /**
     *The table associated with the model.
     * @var string
     */
    protected $table = 'polls';


    /**
     *The attributes that are mass assignable.
     * @var array
     **/
    protected $fillable = [
        'description'
    ];

    # Relationships
    public function options()
    {
        return $this->hasMany(Option::class);
    }

}
