<?php namespace Handlers;

use Redis;
use Reponse;

class MessageCreatedEventHandler {

    /**
     * Event name
     */
    CONST EVENT = 'message.create';

    /**
     * Event channel
     */
    CONST CHANNEL = 'message.create';

    /**
     * Handle the event
     * 
     * @param mixed $data
     */ 
    public function handle($data)
    {
        $redis = Redis::connection();

        $redis->publish(self::CHANNEL, $data);
    }

}
