<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/29/15
 * Time: 8:22 PM
 */

namespace App;


use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Exception;

class Reward extends Model{

    protected $table = "rewards";

    protected $fillable = [

        'name',
        'business_id',
        'description',
        'expiration',
        'points_required',
        'dollar_amount',
        'img'
    ];

    protected $dates = [
        'expiration'
    ];

    public function delete(){

        if($this->relatedImages->first()) {
            $image = $this->relatedImages()->first();

            $image_path = substr($image->file_path, 1);
            unlink($image_path);

        }

        $this->relatedImages()->delete();

        return parent::delete();

    }


    public function business(){


        return $this->belongsTo('App\Business');
    }

    public function coupons(){

        return $this->hasMany('App\Coupon');
    }

    public function scopeAvailable($query){

        return $query->whereHas('coupons',function($q){

           $q->where('status','=','unredeemed');
        });
    }

    public function relatedImages(){

        return $this->hasMany('App\RelatedImage');
    }

    public function getFilePath(){

        if($this->relatedImages->first()){
            $file_path = $this->relatedImages->first()->file_path;
            return $file_path;
        }else{
            return null;
        }

    }


}