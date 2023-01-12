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
  // public static function from(UserType $case): string
  // {
  //   return match ($case) {
  //     UserType::Operator => 'Operator',
  //     UserType::Administrator => 'Administrator',
  //   };
  // }
}
