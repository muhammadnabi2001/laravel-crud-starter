<?php

namespace CrudStarter\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ProductCrudCommand extends Command
{
    protected $signature = 'product:crud {name=Product}';
    protected $description = 'Generate CRUD for given model name';

    public function handle()
    {
        $name = $this->argument('name');

        // 1. Model yaratish
        $this->call('make:model', ['name' => $name, '-mcr' => true]);

        // 2. Blade fayllarni qo‘shish
        $viewPath = resource_path("views/{$name}");
        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
        }
        File::put($viewPath."/index.blade.php", "<h1>{$name} CRUD</h1>");

        $this->info("CRUD for {$name} generated successfully!");
    }
}
