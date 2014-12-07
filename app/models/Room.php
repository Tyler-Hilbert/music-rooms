<?php

class Room extends Eloquent {

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table = 'rooms';

    /**
     * The mass-assignable properties of the model
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Determine if the table will store timesamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Get all the messsages from this Room
     *
     * @return mixed
     */
    public function messages()
    {
        return $this->hasMany('messages');
    }

}
