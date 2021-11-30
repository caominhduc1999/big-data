<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $models = [
        'Customer',
        'Employee',
        'EmployeeType',
        'CustomerType',
        'CustomerPack',
        'Service',
        'HealthStatus'
    ];

    public function register()
    {
    }

    public function boot()
    {
        foreach ($this->models as $model) {
            $folder = "App\Repositories\\$model";
            $interface = "$folder\\{$model}RepositoryInterface";
            $eloquent = "$folder\\{$model}Repository";
            app()->singleton($interface, $eloquent);
        }
    }
}
