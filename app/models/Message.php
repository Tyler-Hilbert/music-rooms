<?php

class Message extends Eloquent {

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The mass-assignable properties of the model
     *
     * @var array
     */
    protected $fillable = ['text', 'user_id', 'room_id'];

    /**
     * Determine if the table will store timesamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get the Message's Room
     *
     * @return type
     */
    public function room()
    {
        return $this->hasOne('Room');
    }

    /**
     * Get the Message's User 
     *
     * @return Mixed
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

}
