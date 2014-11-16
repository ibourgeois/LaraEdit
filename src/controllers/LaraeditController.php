<?php namespace Ibourgeois\Laraedit;

class LaraeditController extends \Controller
{
    public function getIndex() {
        return \View::make('laraedit::layout.master');
    }
}
