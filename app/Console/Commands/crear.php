<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class crear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuario:crear {name} {email} {password} {--rol=user} {--caracteristica=leer,escribir}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear un usuario';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user=new User();
        $user->name=$this->argument('name');
        $user->email=$this->argument('email');        
        $user->password = Hash::make($this->argument('password'));
        $user->rol=$this->option('rol');
        $user->caracteristica=$this->option('caracteristica');
        $user->save();
    }
}
