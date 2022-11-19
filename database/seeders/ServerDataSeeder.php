<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ServerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $table_name = $table->Tables_in_ict_village_lms;
            if ($table_name != 'migrations') {
                $url = env('SERVER_SEED_URL') . "/data" . "/" . $table_name;

                $data = Http::get($url)->json();
                echo $table_name . "<br>";
                if (is_array($data) && count($data)) {
                    DB::table($table_name)->truncate();
                    DB::table($table_name)->insert($data);
                }
            }
        }
    }
}
