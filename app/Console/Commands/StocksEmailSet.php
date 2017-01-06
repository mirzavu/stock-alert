<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Stock;

class StocksEmailSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set all stocks email status to false and update todays price';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Stock::query()->update(['email' => false]);
        $stocks = Stock::all();
        foreach ($stocks as $stock) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://finance.google.com/finance/info?client=ig&q=NSE:'.$stock->stock,
                CURLOPT_USERAGENT => 'Codular Sample cURL Request'
            ));
            $resp = curl_exec($curl);
            // var_dump($resp);
            preg_match_all('/{\K[^}]*(?=})/m', $resp, $matches);
            // var_dump($matches[0][0]);exit;
            $j = json_decode('{'.$matches[0][0].'}');
            $current = $j->l;
            if(empty($current))
                continue;
            $stock->todaysprice = $current;
            $stock->save();
        }
    }
}
