<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Film;
use App\Models\Timetable;

class daily_update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statusUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Database Daily';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //Fetch film data
        $films = DB::table('films')
        ->whereDate('end_date', '<', Carbon::now())
        ->get();

        //Film Update
        foreach ($films as $film) {
            DB::table('films')
            ->where('id', '=', $film->id)
            ->update(['status'=>'ENDED']);
        }

        //Debungging
        // \Log::info($films);
    }
}
