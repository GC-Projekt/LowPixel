<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создать админа';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $username = $this->ask("Введите имя пользователя");
        $password_raw = $this->ask('Введите пароль');
        $password = \Hash::make($password_raw);
        $user = new User([
            'name' => $username,
            'password' => $password,
            'role' => 0,
        ]);
        $user->save();
        $this->info("Пользователь ".$username." создан");
    }
}
