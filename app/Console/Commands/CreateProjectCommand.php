<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class CreateProjectCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cma:project:new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Candy Machine Affiliates project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $owner = $this->ask('Project owner (wallet public key):');
        $candy_machine_id = $this->ask('Candy machine id:');
        $title = $this->ask('Project title:');
        $description = $this->ask('Project description:');
        $project_url = $this->ask('Project URL:');
        $image_url = $this->ask('Project image URL:');

        Project::create(
            [
                'owner' => $owner,
                'candy_machine_id' => $candy_machine_id,
                'title' => $title,
                'description' => $description,
                'url' => $project_url,
                'image_url' => $image_url,
            ]
        );

        $this->info('Project created!');

        return 0;
    }
}
