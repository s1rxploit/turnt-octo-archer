<?php namespace Cashout\Helpers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class JSHelper
{
    public $js_vars;
    public $js_path;
    public $controllers = [];
    public $services = [];
    public $controller_path = '/controllers';
    public $service_path = '/services';

    public function __construct()
    {
        $this->js_path = public_path('js');
        $this->js_vars = Config::get('angular', []);
    }

    /**
     * Get all angular controllers for the application
     * @return mixed
     */
    public function controllers()
    {
        return $this->getAngularLocation($this->controller_path);
    }

    /**
     * Get all service factories for the application
     * @return mixed
     */
    public function services()
    {
        return $this->getAngularLocation($this->service_path);
    }

    /**
     * Gets the files in the folder and returns their path
     * with the route relative to the public folder
     * @param $path
     * @return mixed
     */
    private function getAngularLocation($path)
    {
        $files = File::files( $this->js_path . $path );
        foreach($files as &$location)
        {
            $location = str_replace(public_path() , '', $location);
        }
        return $files;
    }

    /**
     * Add elements to the configuration.
     * @param $key
     * @param $value
     */
    public function put($key,$value)
    {
        $this->js_vars[ $key ] = $value;
    }

    /**
     * Remove elements from the configuration
     * @param $key
     */
    public function delete($key)
    {
        unset( $this->js_vars[ $key ] );
    }

    /**
     * Check if an element in the configuration exists
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset( $this->js_vars[ $key ] );
    }

    /**
     * Return the js vars as a JSON Object
     * @return string
     */
    public function __toString()
    {
        return json_encode( $this->js_vars );
    }
}