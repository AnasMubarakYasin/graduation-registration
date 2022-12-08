<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

enum AdminRole: string
{
    case SuperAdministrator = 'super_administrator';
    case Administrator = 'administrator';
    case AcademicOperator = 'academic_operator';
    case FacultyOperator = 'faculty_operator';

    public static function from_string(string $value): static
    {
        return match($value) {
            'super_administrator' => static::SuperAdministrator,
            'administrator' => static::Administrator,
            'academic_operator' => static::AcademicOperator,
            'faculty_operator' => static::FacultyOperator,
        };
    }
    public static function to_readable(string $value): string {
        return match($value) {
            'super_administrator' => 'Super Administrator',
            'administrator' => 'Administrator',
            'academic_operator' => 'Academic Operator',
            'faculty_operator' => 'Faculty Operator',
        };
    }
}

class Admin extends Authenticatable
{
    use HasFactory;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'photo',
        'name',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getReadableRoleAttribute()
    {
        return AdminRole::to_readable($this->role);
    }

    public function getIsSuperAdministratorAttribute()
    {
        return $this->role == AdminRole::SuperAdministrator->value;
    }

    public function getIsAdministratorAttribute()
    {
        return $this->role == AdminRole::Administrator->value;
    }

    public function getIsAcademicOperatorAttribute()
    {
        return $this->role == AdminRole::AcademicOperator->value;
    }

    public function getIsFacultyOperatorAttribute()
    {
        return $this->role == AdminRole::FacultyOperator->value;
    }
}
