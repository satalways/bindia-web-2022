<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\AssignOp\Mod;
use function PHPUnit\Framework\isNull;

class BaseModel extends Model
{
    protected $metaData = [];

    /**
     * @return mixed
     */
    public static function getTableName(): mixed
    {
        return with(new static)->getTable();
    }

    /**
     * @return array
     */
    public function getTableColumnsNames(): array
    {
        return once(function() {
            return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        });
    }

    public function setMeta($key, $value)
    {
        $row = Meta::query()
                   ->where('table_name', $this->getTable())
                   ->where('data_id', $this->{$this->getKeyName()})
                   ->where('key', $key)
                   ->firstOrNew();

        $row->data_id = $this->id;
        $row->key = $key;
        $row->table_name = $this->getTable();
        $row->value = $value;

        try {
            $row->save();
        } catch (\Exception) {

        }
    }

    public function getMeta($key, $defaultValue = null)
    {
        $allMetas = $this->getAllMetas();

        return $allMetas->{$key} ?? $defaultValue;
    }

    public function getAllMetas()
    {
        return (object) Meta::query()
                            ->where('table_name', $this->getTable())
                            ->where('data_id', $this->{$this->getKeyName()})
                            ->get()->pluck('value', 'key')->toArray();
    }

    public function __get($key)
    {
        return parent::__get($key) ?? $this->getMeta($key);
    }

///**
// * @param $key
// * @return mixed|null
// *
// * Get single meta key value
// */
//public function meta($key)
//{
//    $tableName = $this->getTable();
//    $keyName = $this->getKeyName();
//
//    return once(function() use ($key, $tableName, $keyName) {
//        $row = Meta::query()->where('table_name', $tableName)
//                   ->where('data_id', $this->{$keyName})
//                   ->where('key', $key)
//                   ->first();
//        if ($row) {
//            if (in_array(strtolower($row->type), ['object', 'array', 'null'])) return unserialize($row->value);
//
//            return $row->value;
//        } else {
//            return null;
//        }
//    });
//}
//
///**
// * @param $key
// * @return bool
// *
// * Check if provided key is a table column
// */
//public function isKeyColumn($key)
//{
//    return in_array($key, $this->getTableColumnsNames());
//}
//
//public function __get($key)
//{
//    if (parent::__get($key)) {
//        return parent::__get($key);
//    }
//
//    $val = $this->meta($key);
//    if ($val) {
//        $this->setAttribute($key, $val);
//    }
//
//    return $val;
//}
//
//public function __set($key, $value)
//{
//    if (parent::__get($key)) {
//        return;
//    }
//
//    if (! $this->isKeyColumn($key)) {
//        $this->metaData[$key] = $value;
//        $this->setAttribute($key, $value);
//
//        return;
//    }
//
//    parent::__set($key, $value);
//}
//
//public function saveMetas()
//{
//    foreach ($this->metaData as $key => $value) {
//        $meta = Meta::query()
//                    ->where('table_name', $this->getTable())
//                    ->where('data_id', $this->{$this->getKeyName()})
//                    ->where('key', $key)
//                    ->firstOrNew();
//
//        try {
//            $meta->data_id = $this->{$this->getKeyName()};
//            $meta->table_name = $this->getTable();
//            $meta->key = $key;
//            $meta->type = gettype($value);
//            if (is_array($value) || is_object($value) || is_null($value)) $value = serialize($value);
//            $meta->value = $value;
//            dump( $meta->toArray() );
//            $meta->save();
//        } catch (\Exception $exception) {
//            dd($exception->getMessage());
//        }
//    }
//}
//
//public function getMetas()
//{
//    return once(function() {
//        $rows = Meta::query()
//                    ->select(['key', 'value', 'type'])
//                    ->where('table_name', $this->getTable())
//                    ->where('data_id', $this->{$this->getKeyName()})
//                    ->get();
//
//        foreach ($rows as $row) {
//            if (in_array(strtolower($row->type), ['object', 'array', 'null'])) {
//                $value = unserialize($row->value);
//            } else $value = $row->value;
//
//            $this->setAttribute($row->key, $value);
//            $this->metaData[$row->key] = $value;
//        }
//
//        return $this->metaData;
//    });
//}
//
//public function bootIfNotBooted()
//{
//    parent::bootIfNotBooted();
//
//    static::saving(function($model) {
//        foreach ($model->getMetas() as $key => $val) {
//            unset($model->attributes[$key]);
//        }
//    });
//    static::saved(function($model) {
//        $model->saveMetas();
//        $model->getMetas();
//    });
//}
//
//public function getMetaAttribute()
//{
//    return (object) $this->getMetas();
//}
}
