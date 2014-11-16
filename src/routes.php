<?php

Route::group(array('prefix' => Config::get('laraedit::laraedit.uri'), 'before' => 'laraedit_dev'), function()
{
	Route::get('/', array(
		'as' => 'laraedit_home',
		'uses' => 'Ibourgeois\Laraedit\LaraeditController@getIndex'
	));
};
