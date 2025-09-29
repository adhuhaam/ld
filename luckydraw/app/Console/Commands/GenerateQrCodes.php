<?php

namespace App\Console\Commands;

use App\Models\QrCode;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateQrCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'codes:generate {count=100 : Number of codes to generate} {--prefix=BR- : Prefix for lucky IDs} {--location= : Location hint for the codes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate QR codes for the lucky draw';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = (int) $this->argument('count');
        $prefix = $this->option('prefix');
        $location = $this->option('location');

        $this->info("Generating {$count} QR codes with prefix '{$prefix}'...");

        $bar = $this->output->createProgressBar($count);
        $bar->start();

        for ($i = 0; $i < $count; $i++) {
            $code = strtoupper(Str::ulid());
            $luckyId = $prefix . strtoupper(base_convert(rand(100000, 999999), 10, 36));

            // Ensure unique lucky ID
            while (QrCode::where('lucky_id', $luckyId)->exists()) {
                $luckyId = $prefix . strtoupper(base_convert(rand(100000, 999999), 10, 36));
            }

            QrCode::create([
                'code' => $code,
                'lucky_id' => $luckyId,
                'location_hint' => $location,
                'status' => 'active',
            ]);

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("Successfully generated {$count} QR codes!");
        
        if ($location) {
            $this->info("Location: {$location}");
        }
    }
}
