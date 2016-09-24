<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24/09/16
 * Time: 17:56
 */

namespace Ecos\Model;

use Illuminate\Database\Eloquent\Model;

class Usuario  extends Model
{

    protected $table = 'usuarios';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome'
    ];

    // Rest of your code...

}