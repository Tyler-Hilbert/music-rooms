<?php

class RoomsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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

		return View::make('room')->withRoom($room);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
