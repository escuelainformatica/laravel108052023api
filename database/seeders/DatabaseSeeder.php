<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Factura;
use App\Models\FacturaCliente;
use App\Models\FacturaDetalle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cli=new FacturaCliente();
        $cli->nombre="john doe";
        $cli->save();

        $fact=new Factura();
        $fact->fecha=new \DateTime('now');
        $fact->cliente_id=$cli->id;
        $fact->save();

        $detalle1=new FacturaDetalle();
        $detalle1->factura_id=$fact->id;
        $detalle1->producto="cocacola";
        $detalle1->cantidad=3;
        $detalle1->preciounitario=2;
        $detalle1->save();

        $detalle2=new FacturaDetalle();
        $detalle2->factura_id=$fact->id;
        $detalle2->producto="fanta";
        $detalle2->cantidad=5;
        $detalle2->preciounitario=10;        
        $detalle2->save();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
