<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class listar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuario:listar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listar los usuarios';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->table(['id','name','email','rol','caracteristica'],
             User::all(['id','name','email','rol','caracteristica'])->toArray());
    }
}
