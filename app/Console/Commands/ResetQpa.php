<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;

class ResetQpa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:reset-qpa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'reset qpa to 100 everymonth';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $employee = Employee::all();
        foreach ($employee as $item) {
            $item->update([
                'qpa' => 100
            ]);
        }
    }
}
