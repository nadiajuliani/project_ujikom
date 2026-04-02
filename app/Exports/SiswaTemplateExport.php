<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaTemplateExport implements WithHeadings
{
    public function headings(): array
    {
        return [
            'name',
            'email',
            'kelas',
            'password',
        ];
    }
}
