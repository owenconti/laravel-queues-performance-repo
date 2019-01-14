<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SampleJobWithModel;
use App\User;
use App\Jobs\SampleJobWithPrimitive;
use App\School;
use App\Student;

class RunExample extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run-example';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the example';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::with('schools')->first();

        SampleJobWithModel::dispatch($user);
        SampleJobWithPrimitive::dispatch($user->id);
    }
}
