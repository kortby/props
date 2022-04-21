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
        $this->output->title('Starting import');
        (new PropscetsImport)->withOutput($this->output)->import('./storage/app/public/prospects/apartments-prospects.csv');
        $this->output->success('Import successful');

    }


}
