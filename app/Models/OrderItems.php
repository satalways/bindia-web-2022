<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class OrderItems extends Model
{
    use HasFactory;

    protected $table = 'ta_items';

    public $timestamps = false;

    protected $casts = [
        'veg' => 'boolean',
        'vegan' => 'boolean',
        'nuts' => 'boolean',
        'dairy' => 'boolean',
        'gluten' => 'boolean',
        'chili' => 'boolean',
        'active' => 'boolean',
    ];

    public function getImageAttribute()
    {
        $path = 'asstes/image/take-away/' . $this->slug . '.jpg';
        if (!is_file(public_path($path))) $path = 'asstes/image/items/' . $this->slug . '.png';
        if (!is_file(public_path($path))) $path = 'asstes/image/items/' . $this->slug . '.jpg';
        if (is_file(public_path($path))) {
            return asset($path);
        } else {
            return asset('asstes/image/items/default.jpg');
        }
    }

    public function getImageThumbnailAttribute()
    {
        $path = 'asstes/image/take-away/' . $this->slug . '.jpg';
        if (!is_file($path)) $path = public_path('asstes/image/items/' . $this->slug . '.png');
        if (!is_file($path)) $path = public_path('asstes/image/items/' . $this->slug . '.jpg');
        if (!is_file($path)) return asset('asstes/image/items/default-thumb.png');

        $thumbPath = public_path('asstes/image/items/' . $this->slug . '-thumb' . substr($path, -4));
        if (!is_file($thumbPath)) {
            //Image::make($path)->resize(220, 176)->save($thumbPath);
            return $this->getImageAttribute();
        }

        return asset('asstes/image/items/' . basename($thumbPath));
    }

    public function getDescription()
    {
        return getCurrentLang() == 'en' ? $this->description_en : $this->description_dk;
    }

    public function getPortionSlugAttribute()
    {
        if (getCurrentLang() === 'da') {
            if ($this->portion === '2 pieces') return '2stk';
            if ($this->portion === '4 pieces') return '4stk';
            if ($this->portion === 'set of 4') return 'set-med-4';
            return \Str::slug($this->portion);
        } else {
            return \Str::slug($this->portion);
        }
    }
}
