<?php

namespace Modules\Why\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\App;

class Why extends Model
{
    use HasFactory;

    protected $fillable = ['name_en','name_ar','name_fr','name_ja','description_en','description_ar','description_fr','description_ja','photo'];
    
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

    protected static function newFactory()
    {
        return \Modules\Why\Database\factories\WhyFactory::new();
    }
}
