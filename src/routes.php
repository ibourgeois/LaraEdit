<?php

Route::group(array('prefix' => Config::get('laraedit::laraedit.uri')), function()
{
	Route::get('/', array(
		'as' => 'laraedit_home',
		'uses' => 'Ibourgeois\Laraedit\LaraeditController@getIndex'
	));

	Route::post('/save', array(
		'as' => 'laraedit_save',
		'uses' => 'Ibourgeois\Laraedit\LaraeditController@postSave'
	));

});