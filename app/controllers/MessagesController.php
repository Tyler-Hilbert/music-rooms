<?php

use Handlers\MessageCreatedEventHandler as Handler;

class MessagesController extends \BaseController {

	/**
	 * Store a newly created message in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$input['room_id'] = Session::get('room_id');

		$input['user_id'] = Auth::id();

		$message = Message::create($input);

		return $message;
	}

}
