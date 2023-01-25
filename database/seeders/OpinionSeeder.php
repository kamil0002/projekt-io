<?php

namespace Database\Seeders;

use App\Models\Opinion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OpinionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $opinions = [
      [
        'content' => 'Świetna wypożyczalnia',
        'user_id' => 1,
      ],
      [
        'content' => 'Rewelacja, polecam!',
        'user_id' => 2,
      ],
      [
        'content' => 'Szybko i sprawnie!',
        'user_id' => 3,
      ],
      [
        'content' => 'Ekstra obsługa!',
        'user_id' => 5,
      ]
    ];

    foreach ($opinions as $opinion) {
      Opinion::create([
        'content' => $opinion['content'],
        'user_id' => $opinion['user_id'],
      ]);
    }
  }
}
