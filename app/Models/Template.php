<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $table = 'email_templates';

    public $timestamps = false;

    protected $appends = [
        'template_text',
        'files',
        'content2'
    ];

    /**
     * @return mixed
     */
    public function getTemplateTextAttribute()
    {
        return $this->content;
    }

    /**
     * @return array
     *
     * Get attached files array.
     */
    public function getFilesAttribute()
    {
        return [];
//        $path = CONTENT_PATH . 'email_template' . DS . $this->TemplateNo;
//
//        if (!is_dir($path)) {
//            return [];
//        }
//
//        return Files::get_files($path, true);
    }

    public function getContentAttribute()
    {
        $content = strtr($this->attributes['content'] ?? '', [
            '{office_assistant}' => config('admins.office_assistance_name')
        ]);

        /**
         * If this is SMS template then do not add HTML tags.
         */
        if (str_contains($this->attributes['TemplateNo'], '.4.')) {
            return $content . "\n" . '---' . "\n" . 'Tracking ID: ' . $this->id . '_' . $this->attributes['TemplateNo'];
        } else {
            return $content . '<br><br>---<br>Tracking ID: ' . $this->id . '_' . $this->attributes['TemplateNo'];
        }
    }

    /**
     * @return mixed|string
     *
     * This attribute will return email content data without proceeding tracking code or other variables.
     */
    public function getContent2Attribute()
    {
        return $this->attributes['content'] ?? '';
    }
}
