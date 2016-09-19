<?php 
namespace App\Api\V1\Modules;

use Illuminate\Support\ServiceProvider;
/**
 * ServiceProvider
 *
 * The service provider for the modules. After being registered
 * it will make sure that each of the modules are properly loaded
 * i.e. with their routes, views etc.
 *
 * @author Emperor Duan <hoangdv1112@gmail.com>
 * @package App\Api\V1\Modules
 */
defined('XF_ROOT') or define('XF_ROOT', dirname(__FILE__));
class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot()
    {
        // For each of the registered modules, include their routes and <Views></Views>
        $directories = glob(__DIR__ . '/*', GLOB_ONLYDIR);
        foreach ($directories as $dir) {
            if(file_exists($dir . '/routes.php')) {
                include $dir . '/routes.php';
            }
        }
    }
    
    public function register() {
        
    }
}