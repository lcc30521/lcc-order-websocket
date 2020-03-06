<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Order;

class OrderStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $order;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order=$order;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {    //一个事件通知两个频道
      
        return [
            new PrivateChannel('Order'.$this->order->id),
            new PrivateChannel('User.'.$this->order->user_id)
        ];
    
    }

    //编辑想要传递的数据
    public function broadcastWith(){
        return[
          'id'=>$this->order->id,
          'status'=>$this->order->status(),   //返回最新的实例对象  也就是本次状态
          'cnstatus'=>Order::statuses[$this->order->status]
        ];
    }
}
