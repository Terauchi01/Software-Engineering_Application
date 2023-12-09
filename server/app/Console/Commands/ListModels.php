<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File; 
class ListModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:list-models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $modelsDirectory = app_path('Models');
        $models = File::files($modelsDirectory);

        $this->info('Models:');
        foreach ($models as $model) {
            $modelName = pathinfo($model->getFilename(), PATHINFO_FILENAME);
            $this->line('  ' . $modelName);
        }
    }
}
