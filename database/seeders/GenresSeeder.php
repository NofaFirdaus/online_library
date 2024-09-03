<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genres;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $genres = [
            'aksi', 'fantasi','romantis', 'komedi', 'drama', 'horror', 'misteri', 'slice of life'
        ];
        for($i = 0;$i < count($genres) ;$i++){
            Genres::create([
                        'id'=>$i+1,
                        'name'=>$genres[$i]
                    ]);
        }

    }
}
