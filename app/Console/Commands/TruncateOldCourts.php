<?php

namespace App\Console\Commands;

use App\Models\Court;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class TruncateOldCourts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'court:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina pistas que ya han pasado de fecha';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Court::where('date_booking', '<', Carbon::now())->each(function ($court)
        {
            $court->delete();
        });
    }
}
