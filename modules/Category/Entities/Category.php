<?php

namespace Modules\Category\Entities;

use Illuminate\Support\Facades\App;
use Modules\Product\Entities\Product;
use Modules\Project\Entities\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name_en','name_ar','name_fr','name_ja','description_en','description_ar','description_fr','description_ja','photo_path','parent_id','slug'];

    public function childreen(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function products(){
        return $this->hasMany(Project::class);
    }


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
        return \Modules\Category\Database\factories\CategoryFactory::new();
    }
}
