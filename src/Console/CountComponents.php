<?php

namespace Bangaping27\ComponentCounter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class CountComponents extends Command
{
    protected $signature = 'count:components';
    protected $description = 'Count the number of routes, controllers, views, models, migrations, and seeders';

    public function handle()
    {
        $controllerPath = app_path('Http/Controllers');
        $viewPath = resource_path('views');
        $modelPath = app_path('Models');
        $migrationPath = database_path('migrations');
        $seederPath = database_path('seeders');

        $totalControllers = $this->countFiles($controllerPath);
        $totalViews = $this->countFiles($viewPath);
        $totalModels = $this->countFiles($modelPath);
        $totalMigrations = $this->countFiles($migrationPath);
        $totalSeeders = $this->countFiles($seederPath);
        $totalRoutes = count(Route::getRoutes());

        $this->line('============================================');
        $this->line('|       Laravel Application Report         |');
        $this->line('============================================');
        $this->info(sprintf("| Total Controllers : %4d |", $totalControllers));
        $this->info(sprintf("| Total Views       : %4d |", $totalViews));
        $this->info(sprintf("| Total Models      : %4d |", $totalModels));
        $this->info(sprintf("| Total Migrations  : %4d |", $totalMigrations));
        $this->info(sprintf("| Total Seeders     : %4d |", $totalSeeders));
        $this->info(sprintf("| Total Routes      : %4d |", $totalRoutes));
        $this->line('============================================');
        $this->line('|       Powered by raflianggoro.com         |');
        $this->line('============================================');

        return 0;
    }

    /**
     * Count the number of files in a directory.
     *
     * @param string $path
     * @return int
     */
    protected function countFiles($path)
    {
        return is_dir($path) ? count(File::allFiles($path)) : 0;
    }
}