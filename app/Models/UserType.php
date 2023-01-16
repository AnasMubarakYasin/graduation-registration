<?php

namespace App\Models;

enum UserType
{
  case Administrator;
  case Operator;

  public function to_string(): string
  {
    return match ($this) {
      UserType::Operator => 'Operator',
      UserType::Administrator => 'Administrator',
    };
  }
  public static function to_array(): array
  {
    return [
      'administrator' => UserType::Administrator->to_string(),
      'operator' => UserType::Operator->to_string(),
    ];
  }
}
