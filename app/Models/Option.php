<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

    public $timestamps = false;

    /**
     *The table associated with the model.
     * @var string
     */
    protected $table = 'options';


    /**
     *The attributes that are mass assignable.
     * @var array
     **/
    protected $fillable = [
        'description'
    ];

    # Relationships
    public function poll()
    {
        return $this->belongsTo(Option::class);
    }
}
