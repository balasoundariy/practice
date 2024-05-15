<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class
CloseTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CloseTickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CloseTickets';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $current_time = Carbon::now('Asia/Kolkata');
        $start_time = Carbon::createFromTimeString('13:00:00','Asia/Kolkata');
        $end_time = Carbon::createFromTimeString('14:50:00','Asia/Kolkata');
        if ($current_time->greaterThanOrEqualTo($start_time) && $current_time->lessThan($end_time)) {
            Ticket::query()->update(['is_active' => 1]);
        } else {
            Ticket::query()->update(['is_active' => 0]);
        }
    }
}
