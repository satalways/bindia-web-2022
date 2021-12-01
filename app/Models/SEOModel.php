<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEOModel extends Model
{
    use HasFactory;

    protected $table = 'seo';
    public $timestamps = false;

    public function getTitle()
    {
        return getCurrentLang() === 'en' ? $this->title_en : $this->title;
    }
}
