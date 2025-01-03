<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bulan;

class SinkronisasiBulanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sinkronisasi-bulan-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sinkronisasi data bulan dari tabel terkait';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Bulan::sinkronisasiBulan();
        $this->info('Sinkronisasi data bulan selesai.');
    }
}
