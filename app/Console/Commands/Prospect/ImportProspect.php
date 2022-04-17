<?php

namespace App\Console\Commands\Prospect;

use App\Imports\PropscetsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportProspect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:prospect';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import prospect from the file storage/app/public/prospects/apartments-prospects.csv';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $array = Excel::toArray(new PropscetsImport, storage_path() . "/app/public/prospects/apartments-prospects.csv");

        dd($array);
    }
}
