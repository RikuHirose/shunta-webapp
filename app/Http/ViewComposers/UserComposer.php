<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;

class UserComposer
{

    protected $user;

    public function __construct()
    {
        $this->user = \Auth::user()->load('image');
    }

    /**
    * Bind data to the view.
    * @param View $view
    * @return void
    */
    public function compose(View $view)
    {
        $view->with('currentUser', $this->user);
    }
}