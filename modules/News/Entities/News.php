<?php

namespace Modules\News\Entities;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title_en','title_ar','title_fr','title_ja','content_en','content_ar','content_fr','content_ja','photo','slug'];
    
    public function getTitleAttribute()
    {
        $locale = App::getLocale();
        $cloumn = 'title_' . $locale;
        return $this->{$cloumn};
    }

    public function getContentAttribute()
    {
        $locale = App::getLocale();
        $cloumn = 'content_' . $locale;
        return $this->{$cloumn};
    }
    protected static function newFactory()
    {
        return \Modules\News\Database\factories\NewsFactory::new();
    }
}
