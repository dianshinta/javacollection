<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['nip' => '1001', 'name' => 'John Doe', 'email' => 'johndoe@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'manager', 'gaji_pokok' => 10000000],
            ['nip' => '1002', 'name' => 'Jane Smith', 'email' => 'janesmith@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 8000000],
            ['nip' => '1003', 'name' => 'Alice Johnson', 'email' => 'alicejohnson@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 5000000],
            ['nip' => '1004', 'name' => 'Bob Brown', 'email' => 'bobbrown@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 11000000],
            ['nip' => '1005', 'name' => 'Charlie Davis', 'email' => 'charliedavis@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 4500000],
            ['nip' => '1006', 'name' => 'Daisy White', 'email' => 'daisywhite@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'supervisor', 'gaji_pokok' => 8500000],
            ['nip' => '1007', 'name' => 'Ethan Black', 'email' => 'ethanblack@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 4800000],
            ['nip' => '1008', 'name' => 'Fiona Green', 'email' => 'fionagreen@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'supervisor', 'gaji_pokok' => 8700000],
            ['nip' => '1009', 'name' => 'George Blue', 'email' => 'georgeblue@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 4700000],
            ['nip' => '1010', 'name' => 'Hannah Yellow', 'email' => 'hannahyellow@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 10500000],
            ['nip' => '1011', 'name' => 'Ian Orange', 'email' => 'ianorange@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 4600000],
            ['nip' => '1012', 'name' => 'Julia Violet', 'email' => 'juliaviolet@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'supervisor', 'gaji_pokok' => 8200000],
            ['nip' => '1013', 'name' => 'Kevin Indigo', 'email' => 'kevinindigo@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 5000000],
            ['nip' => '1014', 'name' => 'Luna Gray', 'email' => 'lunagray@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 10800000],
            ['nip' => '1015', 'name' => 'Mason Pink', 'email' => 'masonpink@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 4900000],
            ['nip' => '1016', 'name' => 'Nina Brown', 'email' => 'ninabrown@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'supervisor', 'gaji_pokok' => 8600000],
            ['nip' => '1017', 'name' => 'Oscar White', 'email' => 'oscarwhite@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 5200000],
            ['nip' => '1018', 'name' => 'Paula Red', 'email' => 'paulared@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 10900000],
            ['nip' => '1019', 'name' => 'Quinn Blue', 'email' => 'quinnblue@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 4700000],
            ['nip' => '1020', 'name' => 'Ruby Green', 'email' => 'rubygreen@example.com', 'password' => Hash::make('password123'), 'jabatan' => 'karyawan', 'gaji_pokok' => 8800000],
        ];

        DB::table('users')->insert($users);
    }
}
