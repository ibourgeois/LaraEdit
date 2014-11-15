<?php

Route::group(array('prefix' => Config::get('laraedit::laraedit.uri'), 'before' => 'validate_dev'), function()
{
	Route::get('/', array(
		'as' => 'laraedit_home',
		'uses' => 'iBourgeois\LaraEdit\LaraEditController@getIndex'
	));
};