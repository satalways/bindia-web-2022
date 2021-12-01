<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Mod;

class BaseModel extends Model
{
    /**
     * @return mixed
     */
    public static function getTableName(): mixed
    {
        return with(new static)->getTable();
    }
}
