<?php

namespace Modules\Project\Entities;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title_en','title_ar','title_fr','title_ja','description_en','description_ar','description_fr','description_ja','main_photo','slug','category_id'];
    
    public function category(){
        return $this->belongsTo(Category::class)->withTrashed();
    }


    public function options(){
        return $this->hasMany(ProjectOption::class);
    }

        
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
        return \Modules\Project\Database\factories\ProjectFactory::new();
    }
}
