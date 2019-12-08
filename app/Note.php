<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
     /**
     * @var string
     */
    protected $table = 'notes';

    /**
     * @var array
     */
    protected $guarded = [];

}
