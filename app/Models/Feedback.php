<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'requested_feedback';

    protected $dates = ['time'];

    protected $casts = [
        'email_sent_to_staff' => 'boolean',
        'hide_from_staff' => 'boolean',
        'published' => 'boolean',
        'deleted' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'data_id');
    }

    public function getShopAttribute()
    {
        if ($this->type === 'weborder' || $this->type === 'weborder2') {
            return $this->order->shop ?? '';
        } else {
            return '';
        }
    }


    public function getAvgAttribute()
    {
        $sum = $count = 0;
        for ($x = 0; $x <= 12; $x++) {
            $field = 'question_' . $x . '_answer';
            if (str_starts_with($this->{$field}, 'rating_')) {
                if ( substr($this->{$field}, 7) == 0 ) continue;
                $count++;
                $sum += substr($this->{$field}, 7);
            }
        }
        if ($sum == 0) return 0;

        return number_format($sum / $count, 2);
    }

    public function getComment()
    {
        return !str_starts_with($this->question_5_answer, 'rating') ? trim($this->question_5_answer) : trim($this->question_6_answer);
    }

    public function limitedComment()
    {
//        $text = trim($this->getComment());
//        $limit = 18;
//        if (str_word_count($text, 0) > $limit) {
//            $words = str_word_count($text, 2);
//            $pos = array_keys($words);
//            $text = substr($text, 0, $pos[$limit]) . '...';
//        }
//        return $text;

        $comments = trim($this->getComment());
        if (strlen($comments) > 100) {
            return substr($comments,0,100) . '...';
        } else {
            return $comments;
        }
    }

    public function shortName()
    {
        $name = $this->name;
        $names = explode(' ', $name);
        $name = $names[0];
        if (count($names) > 1) {
            if (!blank(last($names)))
                $name .= ' ' . substr(last($names), 0, 1) . '.';
        }
        return $name;
    }
}
