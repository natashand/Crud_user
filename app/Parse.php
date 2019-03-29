<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 12.03.2019
 * Time: 21:34
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Parse extends Model
{
    protected $table = 'parse';

    protected $fillable = [
        'title',
        'image',
        'date_start',
        'date_end',
        'cost',
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];
}