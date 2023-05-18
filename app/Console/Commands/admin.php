<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Throwable;

class admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usuario:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Administrar interactivamente los usuarios';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        while (true) {
            $this->table(
                ['id', 'name', 'email', 'rol', 'caracteristica'],
                User::all(['id', 'name', 'email', 'rol', 'caracteristica'])->toArray()
            );
            $opcion=$this->anticipate('¿Quiere reiniciar la clave o borrar? [reiniciar/borrar]',['reiniciar','borrar']);
            if($opcion==='reiniciar') {
                try {
                    $id = $this->ask("Seleccione el ID del usuario que quiere reiniciar");
                    $user = User::find($id);
                    if($user===null) {
                        throw new \RuntimeException("Usuario no encontrado");
                    }
                    $clave=$this->ask('Indique la nueva clave');
                    $user->password= Hash::make($clave);
                    $user->save();
                    $this->info("OK");
                } catch(Throwable $ex) {             
                    $this->error($ex->getMessage());
                }

            }
            if($opcion==='borrar') {

            $id = $this->ask("Seleccione el ID del usuario que quiere borrar (o vacio para salir)");
            if (!$id) {
                break;
            }
            try {
                $user = User::find($id);
                $user->delete();
            } catch(Throwable $ex) {             
                $this->error($ex->getMessage());
            }
        }
        }
    }
}