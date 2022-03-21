<?php

namespace App\Providers;

use App\Helpers\Template;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{

    const _NAMESPACE_ = "Modules";

    private $moduleClass;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (Schema::hasTable("modules")) {
            $files = glob(base_path("Modules") . "/*");
            foreach ($files as $file) {
                if (file_exists($file . "/Installation.php")) {
                    $class = "\\" . self::_NAMESPACE_ . "\\" . basename($file) . "\\Installation";
                    if (class_exists($class)) {
                        $class = new $class();
                        if (method_exists($class, "init")) {
                            $init = $class->init();

                            $isModule = DB::table("modules")
                                ->where('module_name', "=", $init["name"])
                                ->get();

                            if ($isModule->count() < 1) {
                                DB::table("modules")->insert([
                                    'module_name' => $init["name"],
                                    'module_version' => $init["version"],
                                    'module_namespace' => $init["namespace"],
                                    'module_status' => 0,
                                    'created_at' => date('Y-m-d H:i:s')
                                ]);
                            }

                            $isModuleStatus = DB::table("modules")
                                ->where('module_name', "=", basename($file))
                                ->where('module_status', "=", 1)
                                ->where('module_install', "=", 1)
                                ->get();
                            if ($isModuleStatus->count() > 0) {
                                extract($init);
                                if (property_exists($class, "mergeConfigFrom")) {
                                    if (file_exists($file . "/" . $class->mergeConfigFrom . ".php")) {
                                        $this->app['config']->set(basename($file),require_once base_path("Modules/".basename($file) . "/" . $class->mergeConfigFrom . ".php"));
                                    }
                                }
                                if (property_exists($class, "loadMigrationsFrom")) {
                                    $this->loadMigrationsFrom($file . "/" . $class->mergeConfigFrom);
                                }
                                if (property_exists($class, "loadRoutesFrom")) {
                                    if (file_exists($file . "/" . $class->loadRoutesFrom . ".php")) {
                                       //  Route::group(['prefix'=>"/admin",'as'=>"admin."],$file."/".$class->loadRoutesFrom.".php");
                                        $this->loadRoutesFrom($file . "/" . $class->loadRoutesFrom . ".php");
                                    }
                                }
                                if (property_exists($class, "loadViewsFrom")) {
                                    $this->loadViewsFrom($file . "/" . $class->loadViewsFrom, $init["namespace"]);
                                }
                                if (file_exists($file . "/helpers.php")) {
                                    require_once $file . "/helpers.php";
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
