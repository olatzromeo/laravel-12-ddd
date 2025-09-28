<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DDDStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:ddd {context : The bounded context} {entity : The entity to create the DDD structure}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates DDD folder structure for the given entity on certain context';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $uri = base_path('src/Learnify/'. $this->argument('context') .'/'. $this->argument('entity'));
        $this->info('Creating structure...');

        // Domain layer structure
        File::makeDirectory($uri . '/Domain', 0755, true, true);
        $this->info($uri . '/Domain');

        File::makeDirectory($uri . '/Domain/Entities', 0755, true, true);
        $this->info($uri . '/Domain/Entities');

        File::makeDirectory($uri . '/Domain/ValueObjects', 0755, true, true);
        $this->info($uri . '/Domain/ValueObjects');

        File::makeDirectory($uri . '/Domain/Contracts', 0755, true, true);
        $this->info($uri . '/Domain/Contracts');

        // Application layer structure
        File::makeDirectory($uri . '/Application', 0755, true, true);
        $this->info($uri . '/Application');

        // Infrastructure layer structure
        File::makeDirectory($uri . '/Infrastructure', 0755, true, true);
        $this->info($uri . '/Infrastructure');

        File::makeDirectory($uri . '/Infrastructure/Controllers', 0755, true, true);
        $this->info($uri . '/Infrastructure/Controllers');

        File::makeDirectory($uri . '/Infrastructure/Routes', 0755, true, true);
        $this->info($uri . '/Infrastructure/Routes');

        File::makeDirectory($uri . '/Infrastructure/Validators', 0755, true, true);
        $this->info($uri . '/Infrastructure/Validators');

        File::makeDirectory($uri . '/Infrastructure/Repositories', 0755, true, true);
        $this->info($uri . '/Infrastructure/Repositories');

        File::makeDirectory($uri . '/Infrastructure/Listeners', 0755, true, true);
        $this->info($uri . '/Infrastructure/Listeners');

        File::makeDirectory($uri . '/Infrastructure/Events', 0755, true, true);
        $this->info($uri . '/Infrastructure/Events');

        // api.php
        $content = "<?php\n\n//use Learnify\\".$this->argument('context')."\\".$this->argument('entity')."\\Infrastructure\Controllers\ExampleGETController;\n\n// Simple route example\n// Route::get('/', [ExampleGETController::class, 'index']);\n\n//Authenticathed route example\n// Route::middleware(['auth:sanctum','activitylog'])->get('/', [ExampleGETController::class, 'index']);";
        File::put($uri . '/Infrastructure/Routes/Api.php', $content);
        $this->info('Routes entry point added in ' . $uri . 'Infrastructure/Routes/api.php' );

        // local api.php added to main api.php
        $content = "\nRoute::prefix('" . strtolower($this->argument('context')) . "/" . strtolower($this->argument('entity')) . "')->group(base_path('src/Learnify/". ucfirst($this->argument('context')) . "/" . ucfirst($this->argument('entity')) ."/Infrastructure/Routes/Api.php'));\n";
        File::append(base_path('routes/api.php'), $content);
        $this->info('Module routes linked in main routes directory.');

        // ExampleGETController.php
        $content = "<?php\n\nnamespace Learnify\\" . $this->argument('context')."\\".$this->argument('entity')."\\Infrastructure\\Controllers;\n\nuse App\\Http\\Controllers\\Controller;\n\nfinal class ExampleGETController extends Controller { \n\n public function index() { \n // TODO: DDD Controller content here \n }\n}";
        File::put($uri.'/Infrastructure/Controllers/ExampleGETController.php', $content);
        $this->info('Example controller added');

        // ExampleValidatorRequest.php
        $content = "<?php\n\nnamespace Learnify\\".$this->argument('context')."\\".$this->argument('entity')."\\Infrastructure\\Validators;\n\nuse Illuminate\Foundation\Http\FormRequest;\n\nclass ExampleValidatorRequest extends FormRequest\n{\npublic function authorize()\n{\nreturn true;\n}\n\npublic function rules()\n{\nreturn [\n'field' => 'nullable|max:255'\n];\n}\n\n}";
        File::put($uri.'/Infrastructure/Validators/ExampleValidatorRequest.php', $content);
        $this->info('Example validation request added');

        $this->info('Structure ' . $this->argument('entity') . ' DDD successfully created.');

        return Command::SUCCESS;
    }
}
