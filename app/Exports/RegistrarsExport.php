<?php

namespace App\Exports;

use App\Models\Administrator;
use App\Models\Operator;
use App\Models\Registrar;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class RegistrarsExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithCustomValueBinder
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = auth()->user();
        if ($user::class == Administrator::class) {
            return Registrar::all_validated();
        } else if ($user::class == Operator::class) {
            if ($user->is_faculty) {
                return Registrar::all_faculty_validated($user->faculty);
            }
            return Registrar::all_validated();
        } else {
            return [];
        }
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
            'Date of Entry',
            'Date of Pass',
            'Study Period',
            'Faculty',
            'Study Program',
            'IPK',
            'status',
        ];
    }
    public function columnFormats(): array
    {
        return [
            'ID' => NumberFormat::FORMAT_NUMBER,
            'Name' => DataType::TYPE_STRING,
            'NIM' => NumberFormat::FORMAT_TEXT,
            'NIK' => NumberFormat::FORMAT_TEXT,
            'Place of Birth' => DataType::TYPE_STRING,
            'Date of Birth' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'Date of Entry' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'Date of Pass' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'Study Period' => DataType::TYPE_STRING,
            'Faculty' => DataType::TYPE_STRING,
            'Study Program' => DataType::TYPE_STRING,
            'IPK' => NumberFormat::FORMAT_NUMBER,
            'Status' => DataType::TYPE_STRING,
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
            $registrar->dob_id,
            $registrar->doe_id,
            $registrar->dop_id,
            $registrar->study_period_id,
            $registrar->faculty,
            $registrar->study_program,
            $registrar->ipk,
            $registrar->status,
        ];
    }
}
