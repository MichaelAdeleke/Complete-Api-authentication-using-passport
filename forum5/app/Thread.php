<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected $guarded=[];
    protected $appends=['isSubscribedTo'];
    public function path(){

        return "/threads/{$this->channel->slug }/{$this->id}";
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function creator(){
        return $this->belongsTo(User::class,'user_id');
    
    }
    public function addReply($reply){
      $reply=$this->replies()->create($reply);

      // prepare notification for all subscribers
      
        $this->subscriptions->
        filter(function ($sub) use($reply){
            
            return $sub->user_id != $reply->user_id;
        })
        ->each->notify($reply);
      //  ->each(function($sub) use($reply){
        //    $sub->user->notify(new ThreadWasUpdated($this,$reply));

        //});
        
      return $reply;
    }
    public function channel(){
        return $this->belongsTo(channel::class);
    }

    public function subscribe($userId=null){
        $this->subscriptions()->create([
            'user_id'=>$userId ?: auth()->id(),
        ]);
        return $this;
    }

    public function unsubscribe($userId=null){

        $this->subscriptions()->where('user_id',$userId ?: auth()->id())->delete();

    }

    public function subscriptions(){
        return $this->hasMany(ThreadSubscription::class);
    }

    public function getIsSubscribedToAttribute(){
        return $this->subscriptions()->where('user_id',auth()->id())->exists();
    }
}
