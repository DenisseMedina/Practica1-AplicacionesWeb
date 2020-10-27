<?php

use App\Personas;
use App\Publicaciones;
use App\Comentarios;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PersonasSeeder::class);
        $this->call(PublicacionesSeeder::class);
        $this->call(ComentariosSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
