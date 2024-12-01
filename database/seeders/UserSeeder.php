<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'), // Contraseña predeterminada
        ]);

        $admin->assignRole('Super Admin');

        UserProfile::create([
            'user_id' => $admin->id,
            'last_name' => 'Admin', // Apellido ficticio
            'city' => 'Admin City', // Ciudad ficticia
            'phone' => '123-456-7890', // Teléfono ficticio
            'bio' => 'Este es el perfil del usuario administrador.', // Biografía ficticia
            'profile_picture' => 'path/to/admin_profile_picture.jpg', // Ruta a la foto de perfil
        ]);

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user123'), // Contraseña predeterminada
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'last_name' => 'User', // Apellido ficticio
            'city' => 'User City', // Ciudad ficticia
            'phone' => '987-654-3210', // Teléfono ficticio
            'bio' => 'Este es el perfil del usuario regular.', // Biografía ficticia
            'profile_picture' => 'path/to/regular_user_profile_picture.jpg', // Ruta a la foto de perfil
        ]);
    }
}
