<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;
class Order extends Model
{
   
    use HasStatuses;
    const statuses=[
        1=>'接单',
        2=>'发货',
        3=>'运送中',
        4=>'已送达'
    ];
    protected $fillable=['orderNo','total','meta'];
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function getnamestatusAttribute(){
    	return $this->status?self::statuses[$this->status]:"已接单";
    }
}
