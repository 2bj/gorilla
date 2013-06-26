<?php

Route::get('landing', function()
{
	return Gorilla\Theme::show('landing');
});

Route::post('landing', function()
{
	// Email process ... fill with your code

	Session::flash('landing_success', 'You are awesome !');
	return Redirect::to('landing');
});