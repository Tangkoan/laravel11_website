<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RepairSessionsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:repair-sessions-table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Repair the sessions table if it is crashed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // Execute the SQL statement to repair the sessions table
            DB::statement('REPAIR TABLE sessions');
            $this->info('Sessions table repaired successfully.');
        } catch (\Exception $e) {
            // Catch and display any errors
            $this->error('Error repairing sessions table: ' . $e->getMessage());
        }
    }
}
