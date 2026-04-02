<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public int $duplicate = 0;
    public int $success = 0;

    // simpan email yang sudah diproses di file
    private array $emails = [];

    public function model(array $row)
    {
        if (empty($row['email'])) {
            return null;
        }

        $email = strtolower(trim($row['email']));

        if (in_array($email, $this->emails)) {
            $this->duplicate++;
            return null;
        }

        $this->emails[] = $email;

        if (User::where('email', $email)->exists()) {
            $this->duplicate++;
            return null;
        }

        $this->success++;

        return new User([
            'name'     => $row['name'] ?? '-',
            'email'    => $email,
            'kelas'    => $row['kelas'] ?? '-',
            'is_admin'     => false,
            'password' => Hash::make($row['password'] ?? '123456'),
        ]);
    }
}