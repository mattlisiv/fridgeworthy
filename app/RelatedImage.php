<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class RelatedImage extends Model {

    protected $table = 'related_images';

    protected $fillable = [

        'reward_id',
        'file_path'
    ];

    /**Relationships **/
    public function reward(){

        return $this->belongsTo('App\Reward');
    }


}
