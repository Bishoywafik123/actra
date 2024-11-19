<?php

namespace Modules\Project\Entities;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectOption extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','name_en','name_ar','name_fr','name_ja','description_en','description_ar','description_fr','description_ja','color_en','color_ar','color_ja','color_fr'];
        
    public function getNameAttribute()
    {
        $locale = App::getLocale();
        $cloumn = 'name_' . $locale;
        return $this->{$cloumn};
    }

    public function getDescriptionAttribute()
    {
        $locale = App::getLocale();
        $cloumn = 'description_' . $locale;
        return $this->{$cloumn};
    }

    public function getColorAttribute()
    {
        $locale = App::getLocale();
        $cloumn = 'color_' . $locale;
        return $this->{$cloumn};
    }

    protected static function newFactory()
    {
        return \Modules\Project\Database\factories\ProjectOptionFactory::new();
    }
}
