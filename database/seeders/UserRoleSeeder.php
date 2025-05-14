<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Guru;
use Spatie\Permission\Models\Role;
use App\Models\Siswa;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Guru', 'Siswa'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Tambah user guru
        $guruUser = User::create([
            'name' => 'Sugiarto',
            'email' => 'sugiarto@sija.com',
            'password' => bcrypt('password'),
        ]);
        $guruUser->assignRole('Guru');

        Guru::create([
            'nama' => 'Sugiarto',
            'nip' => '1987654321',
            'gender' => 'L',
            'alamat' => 'Arab Saudi',
            'kontak' => '08123456789',
            'email' => 'sugiarto@sija.com',
        ]);

        // Tambah user siswa
        $siswaUser = User::create([
            'name' => 'Ilham Putra Mahendra',
            'email' => '20413@sija.com',
            'password' => bcrypt('password'),
        ]);
        $siswaUser->assignRole('Siswa');

        Siswa::create([
            'nama' => 'Ilham Putra Mahendra',
            'nis' => '20413',
            'gender' => 'L',
            'alamat' => 'Di dalam pohon beringin Denggung',
            'kontak' => '08987654321',
            'email' => '20410@sija.com',
            'status_pkl' => 'no',
        ]);
    }
}
