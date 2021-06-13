<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Task extends Model
{
    protected $attributes = [
        'status' => "new",
    ];


}
