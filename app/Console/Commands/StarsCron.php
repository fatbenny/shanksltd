<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Goutte\Client as GoutteClient;

use App\Models\Star;

class StarsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stars:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $date = date("Y-m-d");

        for ( $i=0 ; $i<12 ; $i++ ) {

            $url = "https://astro.click108.com.tw/daily_$i.php?iAcDay=$date&iAstro=$i";

            $client = new GoutteClient();

            $crawler = $client->request('GET', $url);

            $navs = $crawler->filter('.FORTUNE_RESOLVE');
        
            $text ='';
            $text =$navs->each(function ($node) {
                return $node->text();
                // echo $text;
            });

            $starsigns = explode("解析",$text[0]);
            // // dump($starsigns);
            $name = mb_substr( $starsigns[0],2,3,"utf-8");//星座名稱

            $starsigns = explode("財運運勢",$starsigns[1]);// 財運運勢的評分及說明

            $wealth = $starsigns[1];

            $starsigns = explode("事業運勢",$starsigns[0]);// 事業運勢的評分及說明
            
            $cause = $starsigns[1];

            $starsigns = explode("愛情運勢",$starsigns[0]);// 愛情運勢的評分及說明

            $love = $starsigns[1];

            $starsigns = explode("整體運勢",$starsigns[0]);// 整體運勢的評分及說明

            $all = $starsigns[1];


            // dump($date);

            // dump($name,$wealth,$cause,$love,$all);


            $Star = Star::where('Name',$name)->where('Date',$date)->count();

            $newDate = [
                'Name'=>$name,
                'Date'=>$date,
                'wealth'=>$wealth,
                'cause'=>$cause,
                'love'=>$love,
                'all'=>$all,
            ];

            if($Star == 0){
                Star::create($newDate);
            }else{
                Star::where('Name',$name)->where('Date',$date)->update($newDate);
            }
        }
    }
}
