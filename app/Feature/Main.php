<?php

namespace App\Feature;

use App\Exceptions\RegistrarStatusException;
use App\Models\Quota;
use App\Models\Registrar;
use App\Models\RegistrarStatus;

class Main
{
  public static Main|null $single = null;
  public static function single()
  {
    if (!self::$single) {
      self::$single = new Main();
    }
    return self::$single;
  }

  public $guard = '';
  public $registrar_biodata_field = [
    'photo',
    'name',
    'nim',
    'nik',
    'pob',
    'dob',
    'faculty',
    'study_program',
    'ipk',
  ];
  public $registrar_file_field = [
    'munaqasyah',
    'school_certificate',
    'ktp',
    'kk',
    'spukt',
  ];

  public function stats_quota(Quota|null $quota)
  {
    if (!$quota) return null;
    $result = ['total' => 0, 'remaining' => 0, 'filled' => 0];
    $result['total'] = $quota->quota;
    $result['filled'] = $quota->registrars()->get()->where('status', RegistrarStatus::Validated->value)->count();
    $result['remaining'] = $result['total'] - $result['filled'];
    return $result;
  }
  public function stats_registrar(Quota|null $quota)
  {
    if (!$quota) return null;
    $result = ['validate' => 0, 'revision' => 0, 'revalidate' => 0, 'validated' => 0];
    $result['validate'] = $quota->registrars()->get()->where('status', RegistrarStatus::Validate->value)->count();
    $result['revision'] = $quota->registrars()->get()->where('status', RegistrarStatus::Revision->value)->count();
    $result['revalidate'] = $quota->registrars()->get()->where('status', RegistrarStatus::Revalidate->value)->count();
    $result['validated'] = $quota->registrars()->get()->where('status', RegistrarStatus::Validated->value)->count();
    return $result;
  }

  public function stats_registrar_student(Registrar|null $registrar)
  {
    $result = ['biodata' => 0, 'file' => 0];
    if (!$registrar) return $result;
    $result['biodata'] = $this->check_create_biodata_registrar($registrar);
    $result['file'] = $this->check_create_file_registrar($registrar);
    if ($registrar->is_create) {
      if ($result['biodata'] == 100.0 && $result['file'] == 100.0) {
        $registrar->status = RegistrarStatus::Validate->value;
        $registrar->save();
      }
    } else if ($registrar->is_validate) {
    } else {
      throw new RegistrarStatusException("invalid status: {$registrar->status}", 400);
    }
    return $result;
  }

  public function check_registrar(Registrar $registrar)
  {
    $result = ['biodata' => 0, 'file' => 0];
    $result['biodata'] = $this->check_create_biodata_registrar($registrar);
    $result['file'] = $this->check_create_file_registrar($registrar);
    if ($registrar->is_create) {
      if ($result['biodata'] == 100.0 && $result['file'] == 100.0) {
        $registrar->status = RegistrarStatus::Validate->value;
        $registrar->save();
      }
    } else if ($registrar->is_validate) {
    } else {
      throw new RegistrarStatusException("invalid status: {$registrar->status}", 400);
    }
    return $result;
  }

  public function check_create_biodata_registrar(Registrar $registrar)
  {
    $count = 0;
    $length = count($this->registrar_biodata_field);
    foreach ($this->registrar_biodata_field as $field) {
      if ($registrar->getAttribute($field) == null) break;
      $count++;
    }
    return $count / $length * 100;
  }
  public function check_create_file_registrar(Registrar $registrar)
  {
    $count = 0;
    $length = count($this->registrar_file_field);
    foreach ($this->registrar_file_field as $field) {
      if ($registrar->getAttribute($field) == null) break;
      $count++;
    }
    return $count / $length * 100;
  }

  public function get_user()
  {
    return auth($this->guard)->user();
  }
  public function get_open_quota()
  {
    /** @var Quota */
    $quota = Quota::where('status', 'open')->first();
    return $quota;
  }
}
