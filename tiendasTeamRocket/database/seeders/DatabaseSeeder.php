<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Producto;
use App\Models\Tienda;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = array("tienda","admin");
        foreach ($roles as $role){
            $rolCreado=Role::factory()->create([
                'name'=>$role
            ]);
        }

        User::factory(10)->create();
        Tienda::factory(10)->create();
        Producto::factory(2)->create();

        $rolAdmin=Role::where('name','admin')->first();

        User::factory()->create([
            'name' => 'Borja',
            'email' => 'borja2626@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role_id' => $rolAdmin->id
        ]);
    }
}


