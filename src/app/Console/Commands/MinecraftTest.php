<?php

namespace App\Console\Commands;

use App\Facades\Hash;
use App\Services\Hasher;
use App\Services\MinecraftStatisticsService;
use App\Services\RolesService;
use Illuminate\Console\Command;

class MinecraftTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mine';

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
        dd(RolesService::getRoles('Elteray'));
    }
}
