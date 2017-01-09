<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Stock;
use Log;
use App\Mailers\AppMailer;

class UpdateStocks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send stock gain loss alert email';

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
    public function handle(AppMailer $mailer)
    {
        $stocks = Stock::all();
        foreach ($stocks as $stock) {
            Log::info($stock);
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
            $stock->currentprice = $current;
            if($stock->email == false)
            {
                $diff =  $current - $stock->buyprice;
                $diff_perc = ($diff*100)/$stock->buyprice;
                if($diff_perc < -0.5)
                {
                    $mailer->sendEmailStockUpdate($stock, $diff_perc);
                    $stock->email = true;
                }
                elseif ($diff_perc > 0.5) {
                    if(empty($stock->maxgain) || $stock->maxgain < $diff_perc)
                    {
                        $stock->maxgain = $diff_perc;
                    }
                    $realtime_diff = $stock->maxgain - $diff_perc;
                    if($realtime_diff > 0.5)
                    {
                        $mailer->sendEmailStockUpdate($stock, $diff_perc);
                        $stock->email = true;
                    }
                }
                else
                {
                    if($stock->maxgain && ($stock->maxgain - $diff_perc) > 0.5)
                    {
                        $mailer->sendEmailStockUpdate($stock, $diff_perc);
                        $stock->email = true;
                    }
                }
            }
            $stock->save();
        }
    }
}
