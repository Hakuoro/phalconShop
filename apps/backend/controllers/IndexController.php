<?php

namespace Multiple\Backend\Controllers;

class IndexController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{

		$cmd = 'curl "https://opskins.com/api/user_api.php?request=GetActiveSales&key=debb4a790d09035e400320034f282274" -H "Host: opskins.com" -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; rv:41.0) Gecko/20100101 Firefox/41.0" -H "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8" -H "Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3" --compressed -H "Cookie: __cfduid=ddc3cf96fca3640f247c5089f875e1c371438544587; _ga=GA1.2.2071348834.1438544588; __mmapiwsid=B4816690-394E-11E5-B1BC-1638559CF7BD:40f515c514f5c59320aafc64bd0d8e5a52b2cc6b; __utma=68077007.2071348834.1438544588.1445587808.1446013929.17; __utmz=68077007.1441057839.2.2.utmcsr=opskins.com|utmccn=(referral)|utmcmd=referral|utmcct=/index.php; avatar=https"%"3A"%"2F"%"2Fsteamcdn-a.akamaihd.net"%"2Fsteamcommunity"%"2Fpublic"%"2Fimages"%"2Favatars"%"2Ffe"%"2Ffef49e7fa7e1997310d705b2a6158ff8dc1cdfeb.jpg; opskins_csrf=xceAKBDUEFjBSTGGGm0c3VlYe4TJOK0c; PHPSESSID=j09ed7fhe17g2ruttnbqdkor15; cf_clearance=e2805dc49c8e137cf4a8be1503529192e6adc491-1446276300-900" -H "Connection: keep-alive" -H "Cache-Control: max-age=0"';

		$ret = json_decode(exec($cmd),true);


		$results = [];
		foreach($ret['result'] as $item){
			$results[$item['market_name']]['opcount']++;
		}

        $url = 'http://steamcommunity.com/profiles/76561198042384491/inventory/json/730/2';

        $inv = json_decode(file_get_contents($url));


        foreach ($inv->rgInventory as $item){
            $id = $item->classid.'_'.$item->instanceid;


            if ($inv->rgDescriptions->{$id}->tradable){
                $results[$inv->rgDescriptions->{$id}->market_name]['count']++;

            }

        }

		$this->view->results = $results;
	}

}