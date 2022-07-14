<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Carbon\Carbon;

class formSubmit implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $price, $name, $auction, $session, $time;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($price, $name, $auction, $session, $time)
    {
        $this->price = $price;
        $this->name = $name;
        $this->auction = $auction;
        $this->session = $session;
        $this->time = $time;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    public function broadcastAs()
    {
       return 'form-submit';
    }

    public function store(Request $request)
    {
        $price = request()->price;
        $name = request()->name;
        $auction = request()->auction;
        $session = request()->session;
        $time = Carbon::now('Asia/Ho_Chi_Minh');
    }
}
