<?php

class RoomsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (!Auth::check()) return Redirect::route('login');

		$rooms = Room::all();

		return View::make('rooms')->withRooms($rooms);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if ($input['name']) 
		{
			$room = Room::create($input);
			
			return Redirect::route('rooms.show', $room->id);
		}

		return Redirect::back();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$room = Room::find($id);

		Session::set('room_id', $room->id);

		return View::make('music-room')->withRoom($room);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function setSong($id)
	{
		$song = Input::get('song');

		$room = Room::find($id);

		$room->current_song = $song;

		$room->save();

		return $room;
	}


}
