<?php

class BaseController extends Controller {

    public $data ;

    function __construct(){
        $this->data['site_config'] = Config::get('cashout');
    }


	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
