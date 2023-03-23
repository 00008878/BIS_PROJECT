<?php

namespace App\Console\Commands;

use App\Models\Client;
use Illuminate\Console\Command;
use App\Services\Elasticsearch\ElasticSearchProvider;

class MakeClientsSearchableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to index all clients';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        private ElasticSearchProvider $elasticSearchProvider
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $query = Client::query()
            ->with('passport');

        $this->output->progressStart($query->count());

        $query->chunk(100, function ($clients) {
            /** @var Client $client */
            foreach ($clients as $client) {
                if ($client->passport !== null) {
                    $data = [
                        'id' => $client->id,
                        'name' => $client->name,
                        'passport_id' => $client->passport->serial_number,
                        'patronymic' => $client->patronymic,
                        'phone' => $client->phone,
                        'pinfl' => $client->passport->pinfl,
                        'surname' => $client->surname,
                    ];

                    try {
                        $this->elasticSearchProvider->createDocument($data);
                    } catch (\Exception) {
                        continue;
                    }

                    $this->output->progressAdvance();
                }
            }
        });

        $this->output->progressFinish();

        return 0;
    }
}
