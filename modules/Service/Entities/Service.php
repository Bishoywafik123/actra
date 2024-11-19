<?php

namespace Modules\Service\Entities;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title_en','title_ar','title_fr','title_ja','description_en','description_ar','description_fr','description_ja','photo_path','slug'];


        
    public function getTitleAttribute()
    {
        $locale = App::getLocale();
        $cloumn = 'title_' . $locale;
        return $this->{$cloumn};
    }

    public function getDescriptionAttribute()
    {
        $locale = App::getLocale();
        $cloumn = 'description_' . $locale;
        return $this->{$cloumn};
    }

    protected static function newFactory()
    {
        return \Modules\Service\Database\factories\ServiceFactory::new();
    }
}
