<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

enum RegistrarStatus: string {
    case Create = 'create';
    case Validate = 'validate';
    case Revision = 'revision';
    case Revalidate = 'revalidate';
    case Validated = 'validated';
}

class Registrar extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'nim',
        'nik',
        'pob',
        'dob',
        'faculty',
        'study_program',
        'ipk',

        'munaqasyah',
        'school_certificate',
        'ktp',
        'kk',
        'spukt',
    ];

    public function getIsCreateAttribute()
    {
        return $this->status == RegistrarStatus::Create->value;
    }
    public function getIsValidateAttribute()
    {
        return $this->status == RegistrarStatus::Validate->value;
    }
    public function getIsRevisionAttribute()
    {
        return $this->status == RegistrarStatus::Revision->value;
    }
    public function getIsRevalidateAttribute()
    {
        return $this->status == RegistrarStatus::Revalidate->value;
    }
    public function getIsValidatedAttribute()
    {
        return $this->status == RegistrarStatus::Validated->value;
    }

    public function quota()
    {
        return $this->belongsTo(Quota::class, 'quota_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
