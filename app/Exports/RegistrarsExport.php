<?php

namespace App\Exports;

use App\Models\Registrar;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RegistrarsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Registrar::all_validated();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'NIM',
            'NIK',
            'Place of Birth',
            'Date of Birth',
            'Faculty',
            'Study Program',
            'IPK',
            'status',
        ];
    }
    public function map($registrar): array
    {
        return [
            $registrar->id,
            $registrar->name,
            "$registrar->nim",
            "$registrar->nik",
            $registrar->pob,
            Carbon::parse($registrar->dob)->format('d-m-Y'),
            $registrar->faculty,
            $registrar->study_program,
            $registrar->ipk,
            $registrar->status,
        ];
    }
}
