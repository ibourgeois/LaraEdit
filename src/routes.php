<?php

Route::group(array('prefix' => Config::get('laraedit::laraedit.uri')), function()
{
	Route::get('/', array(
		'as' => 'laraedit_home',
		'uses' => 'Ibourgeois\Laraedit\LaraeditController@getIndex'
	));
});
