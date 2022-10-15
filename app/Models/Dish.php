<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Translatable\HasTranslations;

class Dish extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable=['name','summary','desc','status','keywords','slug','cover'];
    public $translatable = ['name','summary','desc','keywords'];

    public function comment()
    {
        return $this->hasMany(Review::class);
    }

    public function stars()
    {
        $stars=Review::select(DB::raw('SUM(stars) as total,count(stars) as num'))->where('dish_id',$this->id)->whereNotNull('stars')->where('status',1)->first();
        if($stars->num!=0)
        {
        $stars=(ceil($stars->total/$stars->num));
        return $stars;
        }
        else return 0;
    }
}
