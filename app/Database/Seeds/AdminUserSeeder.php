<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $username = 'admin';
        $existing = $this->db->table('admin_users')->where('username', $username)->get()->getRowArray();

        if ($existing) {
            return;
        }

        $now = date('Y-m-d H:i:s');

        $this->db->table('admin_users')->insert([
            'username'      => $username,
            'password_hash' => password_hash('AnAutoAdmin2026!', PASSWORD_DEFAULT),
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);
    }
}
