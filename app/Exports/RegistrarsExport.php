<?php

namespace App\Exports;

use App\Models\Registrar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrarsExport implements /* FromCollection, */ WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Registrar::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'nim',
            'name',
            'state',
        ];
    }
    public function map($registrar): array
    {
        return [
            $registrar->id,
            $registrar->nim,
            $registrar->name,
            $registrar->state,
        ];
    }
}
