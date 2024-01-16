<?php

class RssegtcronsController extends AppController {

    var $name = 'Rssegtcrons';
    var $uses = array('Feed', 'User', 'Subscriber', 'RssmoreFeedData', 'CronStatus', 'Timezone', 'Tempmessage', 'Rssfeedauthor', 'RssmoreFeedTrack', 'Rssfeedtag', 'RssmoreFeedstory');
    var $helpers = array('Custom', 'Emailhelp');
    var $components = array('Email', 'Session');
    var $view = 'Theme';
    var $theme = 'classic';
    var $banurl = array('http://kk.moswarkok.ru/rss/17k.php');
    var $mysiteurl = 'http://www.specificfeeds.com/';
    var $userids = array();

    //var $userids = array();

    function test_rss() {
        $curldata = $this->get_curl_data("http://feeds.feedburner.com/tctv/FounderStories");
        $rssmoredata = $this->xml_to_array($curldata, true);
        //$rssmoredata  = $this->parseRSS($curldata);
        echo "<pre>";
        print_r($rssmoredata);
        // echo "dsdsd";
        exit;
    }

    function get_rss_data_feed($url) {
        $curldata = $this->get_curl_data($url);
        return $this->xml_to_array($curldata);
    }

    function download_rssmorefeed_data_0_2500() {
        $this->autoLayout = false;
        $this->autoRender = false;
        $cron_id = 31;
        $logdate = "0_2500_" . date('d-m-Y');
        $this->cron_start_status($cron_id, 'rssfeed_type_eight_addlog_' . $logdate);
        $this->download_rssmorefeed_data_new(0, 2500);
        $this->cron_update_status($cron_id);
    }

    function download_rssmorefeed_data_2500_2500() {
        $this->autoLayout = false;
        $this->autoRender = false;
        $cron_id = 32;
        $logdate = "2500_2500_" . date('d-m-Y');
        $this->cron_start_status($cron_id, 'rssfeed_type_eight_addlog_' . $logdate);
        $this->download_rssmorefeed_data_new(2500, 2500);
        $this->cron_update_status($cron_id);
    }

    function download_rssmorefeed_data_new($start_index = 0, $end_index = 1) {
        date_default_timezone_set('UTC');
        ini_set('max_execution_time', -1);


        //$logdate = date('d-m-Y');
        $logdate = $start_index . "_" . $end_index . "_" . date('d-m-Y');
        $cron_id = 4;
        $days_bak_time = strtotime("-30 day");
        $days_bak_time_10 = strtotime("-10 day");
        $logdate_date_bak = date('d-m-Y', $days_bak_time);
        CakeLog::drop('rssfeed_type_eight_addlog_' . $days_bak_time_10);


        CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Cron Start' . "\n\t\r");



        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    )
                )
        );

        $conditions = array(
            'Feed.feed_type' => '8',
            'Feed.url !=' => '',
            'Feed.status' => '1',
			'Feed.cron_status' => 'Y'
        );

        if (!empty($this->userids)) {
            // $conditions['Feed.user_id'] = $this->userids;
        }
        //$conditions['Feed.cron_update <  '] = time() - ((60 * 60));


        $rssmore_data = $this->Feed->find('all', array(
            'fields' => array('Feed.id', 'Feed.user_id', 'Feed.title', 'Feed.url', 'Feed.status'),
            'conditions' => $conditions,
            'order' => array('Feed.cron_update ASC'),
            'limit' => "$start_index,$end_index",
                )
        );



        foreach ($rssmore_data as $rssmore) {


            $feed_id = $rssmore['Feed']['id'];
            $user_id = $rssmore['Feed']['user_id'];
            $feed_url = $rssmore['Feed']['url'];
            $ping_url_arr = parse_url($feed_url);
            $ping_url = $ping_url_arr['host'];


            CakeLog::write('Ping_' . $ping_url . '_' . $logdate, 'Ping[Feed_id-' . $feed_id . ']: ' . $feed_url . "");
            CakeLog::drop('Ping_' . $ping_url . '_' . $days_bak_time_10);
            if ($this->get_http_response_code($feed_url) != '404') {

                CakeLog::write('Ping_' . $ping_url . '_' . $logdate, 'Ping[Feed_id-' . $feed_id . ']: ' . $feed_url . "");
                $this->Feed->query("update feeds set feed_valid='1' where id=$feed_id");
                $curldata = $this->get_curl_data($feed_url);


                if (empty($curldata)) {
                    CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Data not found [Feed_id-' . $feed_id . ']: ' . $feed_url . "\n\t\r");
                    continue;
                } //


                $rssmoredata = $this->xml_to_array($curldata);

                if (empty($rssmoredata)) {

                    CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Data not found [Feed_id-' . $feed_id . ']: ' . $feed_url . "\n\t\r");
                    continue;
                }

                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Process Start[Feed_id-' . $feed_id . '] (' . $feed_url . ')' . "\n\t\r");
                $this->add_rssmore_data($user_id, $feed_id, $feed_url, $rssmoredata);

                $query = "update `feeds` set `cron_update` ='" . time() . "' where id=$feed_id";
                $this->Feed->query($query);

                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Process End (' . $feed_url . ')' . "\n\t\r");
            } else {

                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, '404 found[Feed_id-' . $feed_id . '] : (' . $feed_url . ')' . "\n\t\r");
                $this->Feed->query("update feeds set feed_valid='0' where id=$feed_id");
            }
        }

        // $log = $this->Feed->getDataSource()->getLog(false, false);
        // debug($log); 
        CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Cron End' . "\n\t\r");
    }

    function download_rssmorefeed_data($fid = null) {
        date_default_timezone_set('UTC');
        ini_set('max_execution_time', -1);
        $this->autoLayout = false;
        $this->autoRender = false;

        /* query to check hold crons */
        $difftime = time() - ((60 * 60 * 2));
        $query_update = "update cron_status set running_status = 'NO' where last_execution_time < $difftime";
        $this->Feed->query($query_update);
        /* end */

        $logdate = date('d-m-Y');
        $cron_id = 4;
        $days_bak_time = strtotime("-30 day");
        $days_bak_time_10 = strtotime("-10 day");
        $logdate_date_bak = date('d-m-Y', $days_bak_time);
        CakeLog::drop('rssfeed_type_eight_addlog_' . $days_bak_time_10);

        $this->cron_start_status($cron_id, 'rssfeed_type_eight_addlog_' . $logdate);

        CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Cron Start' . "\n\t\r");



        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    )
                )
        );

        $conditions = array(
            'Feed.feed_type' => '8',
            'Feed.url !=' => '',
            'Feed.status' => '1',
			'Feed.cron_status' => 'Y'
        );

        if (!empty($this->userids)) {
            // $conditions['Feed.user_id'] = $this->userids;
        }
        //$conditions['Feed.cron_update <  '] = time() - ((60 * 60)+1800);


        $rssmore_data = $this->Feed->find('all', array(
            'fields' => array('Feed.id', 'Feed.user_id', 'Feed.title', 'Feed.url', 'Feed.status'),
            'conditions' => $conditions,
            'order' => array('Feed.id ASC', 'Feed.cron_update'),
            'limit' => '5000,5000'
                )
        );



        foreach ($rssmore_data as $rssmore) {


            $feed_id = $rssmore['Feed']['id'];
            $user_id = $rssmore['Feed']['user_id'];
            $feed_url = $rssmore['Feed']['url'];
            $ping_url_arr = parse_url($feed_url);
            $ping_url = $ping_url_arr['host'];


            CakeLog::write('Ping_' . $ping_url . '_' . $logdate, 'Ping[Feed_id-' . $feed_id . ']: ' . $feed_url . "");
            CakeLog::drop('Ping_' . $ping_url . '_' . $days_bak_time_10);
            if ($this->get_http_response_code($feed_url) != '404') {

                CakeLog::write('Ping_' . $ping_url . '_' . $logdate, 'Ping[Feed_id-' . $feed_id . ']: ' . $feed_url . "");
                $this->Feed->query("update feeds set feed_valid='1' where id=$feed_id");
                $curldata = $this->get_curl_data($feed_url);


                if (empty($curldata)) {
                    CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Data not found [Feed_id-' . $feed_id . ']: ' . $feed_url . "\n\t\r");
                    continue;
                } //


                $rssmoredata = $this->xml_to_array($curldata);

                if (empty($rssmoredata)) {

                    CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Data not found [Feed_id-' . $feed_id . ']: ' . $feed_url . "\n\t\r");
                    continue;
                }

                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Process Start[Feed_id-' . $feed_id . '] (' . $feed_url . ')' . "\n\t\r");
                $this->add_rssmore_data($user_id, $feed_id, $feed_url, $rssmoredata);

                $query = "update `feeds` set `cron_update` ='" . time() . "' where id=$feed_id";
                $this->Feed->query($query);

                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Process End (' . $feed_url . ')' . "\n\t\r");
            } else {

                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, '404 found[Feed_id-' . $feed_id . '] : (' . $feed_url . ')' . "\n\t\r");
                $this->Feed->query("update feeds set feed_valid='0' where id=$feed_id");
            }
        }

        //$log = $this->Feed->getDataSource()->getLog(false, false);
        // debug($log); 
        CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Cron End' . "\n\t\r");
        $this->cron_update_status($cron_id);
    }

    function add_rssmore_data($user_id, $feed_id, $url, $rssmoredata) {
        date_default_timezone_set('UTC');
        $logdate = date('d-m-Y');
        $records = 0;

        //print_r($url)."<br />";
        foreach ($rssmoredata as $feeddata) {

            if (empty($feeddata['link'])) {
                continue;
            }
            $count = $this->RssmoreFeedData->find('count', array(
                'conditions' => array('RssmoreFeedData.link' => $feeddata['link'], 'RssmoreFeedData.feed_id' => $feed_id)
            ));

            if ($count == 0 and ! empty($feeddata['link'])) {

                $dataarr = array();
                $dataarr['RssmoreFeedData']['title'] = utf8_encode(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags($feeddata['title']))));
                $dataarr['RssmoreFeedData']['description'] = ($feeddata['description']);
                $dataarr['RssmoreFeedData']['link'] = $feeddata['link'];
                $dataarr['RssmoreFeedData']['author'] = trim((isset($feeddata['author'])) ? $feeddata['author'] : '');
                $dataarr['RssmoreFeedData']['category'] = trim((isset($feeddata['category'])) ? $feeddata['category'] : '');
                $dataarr['RssmoreFeedData']['pubdate'] = (isset($feeddata['pubDate'])) ? $feeddata['pubDate'] : '';
                if ($feeddata['pubDate'] != "")
                    $dataarr['RssmoreFeedData']['createtime'] = strtotime(preg_replace("((\+|-)[0-9]+)", "", $feeddata['pubDate']));
                else
                    $dataarr['RssmoreFeedData']['createtime'] = time();

                if ($dataarr['RssmoreFeedData']['createtime'] == "" and isset($dataarr['RssmoreFeedData']['pubdate'])) {
                    $dataarr['RssmoreFeedData']['createtime'] = strtotime($dataarr['RssmoreFeedData']['pubdate']);
                } else if ($dataarr['RssmoreFeedData']['createtime'] == 0) {
                    $dataarr['RssmoreFeedData']['createtime'] = time();
                }


                $dataarr['RssmoreFeedData']['server_createtime'] = time();

                $dataarr['RssmoreFeedData']['user_id'] = $user_id;
                $dataarr['RssmoreFeedData']['feed_id'] = $feed_id;

                $this->RssmoreFeedData->create();
                if ($this->RssmoreFeedData->save($dataarr)) {

                    /* if(!empty($dataarr['RssmoreFeedData']['author'])){
                      $this->add_feed_author($dataarr['RssmoreFeedData']['author'],$feed_id);
                      } */


                    $records++;
                }
            }
        }

        CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Records Added : ' . $records . "\n\t\r"); //log    
    }

    function cron_start_status($cron_id = null, $logname = '') {

        $logdate = date('d-m-Y');
        $cron_status = $this->CronStatus->findById($cron_id, array('CronStatus.running_status', 'CronStatus.last_execution_time'));
        $running_status = $cron_status['CronStatus']['running_status'];
        $last_execution_time = $cron_status['CronStatus']['last_execution_time'];
        if ($running_status == 'YES') {
            CakeLog::write($logname, 'Cron Already Running since : ' . date('Y-m-d H:i:s', $last_execution_time) . "\n\t\r");   //log

            exit;
        } else {
            $this->CronStatus->updateAll(array('CronStatus.last_execution_time' => time(), 'CronStatus.running_status' => '"YES"'), array('CronStatus.id' => $cron_id));
        }
    }

    function cron_update_status($cron_id = null) {
        $this->CronStatus->updateAll(array('CronStatus.running_status' => '"NO"'), array('CronStatus.id' => $cron_id));
    }

    function parseRSS($data) {

        App::import('Xml');
        $xml = new Xml($data);
// This converts the Xml document object to a formatted array
        $xmlAsArray = Set::reverse($xml);
// Or you can convert simply by calling toArray();
        $xmlAsArray = $xml->toArray(false);
        return $xmlAsArray;
    }

    function parseRSSOld($data) {
        ini_set('default_charset', 'UTF-8');
        //PARSE RSS FEED

        $parser = xml_parser_create();
        xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8");
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, $data, $valueals, $index);
        xml_parser_free($parser);

        //CONSTRUCT ARRAY
        foreach ($valueals as $keyey => $valueal) {
            if ($valueal['type'] != 'cdata') {
                $item[$keyey] = $valueal;
            }
        }

        $i = 0;
        $l = 0;

        foreach ($item as $key => $value) {

            if ($value['type'] == 'open') {

                $i++;
                $itemame[$i] = $value['tag'];
            } elseif ($value['type'] == 'close') {

                $feed = $values[$i];
                $item = $itemame[$i];
                $i--;

                if (isset($values[$i]) and count($values[$i]) > 1) {


                    $values[$i][$item][] = $feed;
                } else {
                    $values[$i][$item] = $feed;
                }
            } else {

                if (isset($value['value']))
                    $values[$i][$value['tag']] = $value['value'];
            }
        }

        //RETURN ARRAY VALUES
        if (!isset($values[0]))
            return array('');

        return $values[0];
    }

    function xml_to_array($curldata, $maxlimit = false) {

        $array = array('title', 'link', 'guid', 'comments', 'description', 'pubDate', 'category', 'author', 'dc:creator', 'creator', 'content:encoded', 'summary');
        $data = $this->parseRSS($curldata);
        $feed_data_array = array();


        $notitle = 'no title';
        if (!isset($data['rss']['channel']['item'][0]) and isset($data['rss']['channel']['item'])) {
            $feed_data_array[0] = $data['rss']['channel']['item'];
        } elseif (!empty($data['rss']['channel']['item'])) {
            $feed_data_array = $data['rss']['channel']['item'];
        } elseif (!empty($data['rdf:RDF']['channel']['item'])) {
            $feed_data_array = $data['rdf:RDF']['channel']['item'];
        } else if (!empty($data['feed']['entry']) and isset($data['feed']['entry'][0])) {
            $feed_data_array = $data['feed']['entry'];
            $notitle = isset($data['feed']['title']['value']) ? $data['feed']['title']['value'] : 'no title';
        } else if (!empty($data['feed']['entry'])) {
            $feed_data_array = array($data['feed']['entry']);
            $notitle = $data['feed']['title']['value'];
        } else if (!empty($data['RDF']['item'])) {
            $feed_data_array = $data['RDF']['item'];
        }

        $rss_items_array = array();
        $item_number = 1;
        foreach ($feed_data_array as $rssdata) {

            if ($maxlimit == true) {
                if ($item_number > 10)
                    continue;
            }

            $item_number++;


            if (isset($rssdata["title"]['value']) and is_array($rssdata["title"])) {
                $rssdata["title"] = $rssdata["title"]['value'];
            }

            if (isset($rssdata["title"]['0']) and is_array($rssdata["title"])) {
                $rssdata["title"] = $rssdata["title"]['0'];
            }

            if (isset($rssdata["title"]['type']) and is_array($rssdata["title"])) {

                if (isset($rssdata["title"]['value']) and $rssdata["title"]['value'] != "") {
                    $rssdata["title"] = $rssdata["title"]['value'];
                } else {
                    $rssdata["title"] = $notitle;
                }
            }

            if (isset($rssdata["title"]) && empty($rssdata["title"])) {
                $rssdata["title"] = $notitle;
            }

            if (isset($rssdata["link_attr"]['href'])) {
                $rssdata["link"] = $rssdata["link_attr"]['href'];
            } else if (isset($rssdata["link"]['href']) and is_array($rssdata["link"])) {
                $rssdata["link"] = $rssdata["link"]['href'];
            }

            if (isset($rssdata["summary"])) {
                $rssdata["description"] = $rssdata["summary"];
            }
            /** For Link * */
            if (isset($rssdata["feedburner:origLink"]) and ! isset($rssdata["link"])) {
                $rssdata["link"] = $rssdata["feedburner:origLink"];
            }

            if (isset($rssdata["origLink"])) {
                $rssdata["link"] = $rssdata["origLink"];
            } else if (isset($rssdata["guid"]) and is_array($rssdata["guid"]) and ! isset($rssdata["link"]) and $rssdata["guid"]['isPermaLink'] == true) {
                $rssdata["link"] = $rssdata["guid"]['value'];
            } elseif (isset($rssdata["guid"]) and ! isset($rssdata["link"])) {
                $rssdata["link"] = $rssdata["guid"];
            } else if (is_array($rssdata["link"]) and isset($rssdata["link"][0]['href'])) {
                //$rssdata["link"]  = $rssdata["link"][0]['href'];
                foreach ($rssdata["link"] as $linkarr) {
                    if (isset($linkarr['rel']) && $linkarr['rel'] == "alternate") {
                        $rssdata["link"] = $linkarr['href'];
                    }
                }
            }

            if (is_array($rssdata["link"]) and isset($rssdata["link"][0])) {
                $rssdata["link"] = $rssdata['link'][0];
            }

            //** end link 

            if (isset($rssdata["content:encoded"])) {
                $rssdata["description"] = (string) $rssdata["content:encoded"];
            }

            if (isset($rssdata["encoded"])) {
                $rssdata["description"] = (string) $rssdata["encoded"];
            }

            if (isset($rssdata["description"]) and is_array($rssdata["description"]) and empty($rssdata["description"])) {
                $rssdata["description"] = '';
            }

            if (isset($rssdata["description"]) and is_array($rssdata["description"])) {
                $descrp = '';
                $description = $rssdata["description"];

                foreach ($description as $dk => $descr) {
                    $descrp .=$descr;
                }

                $rssdata["description"] = $descrp;
            }

            if (isset($rssdata["content"]['value']) and ! isset($rssdata["description"])) {
                $rssdata["description"] = strip_tags($rssdata["content"]['value']);
            }


            if (!isset($rssdata["description"])) {
                $rssdata["description"] = $rssdata["title"];
            }




            if (!isset($rssdata["pubDate"]) and isset($rssdata["updated"])) {
                $rssdata["pubDate"] = $rssdata["updated"];
            }

            /* if(isset($rssdata["dc:creator"])){
              if(is_array($rssdata["dc:creator"]))
              $dc_author=implode(",",$dc_author);

              $rssdata["author"]=$rssdata["dc:creator"];
              } */

            if (isset($rssdata["creator"])) {
                $rssdata["author"] = $rssdata["creator"];
            }

            if (isset($rssdata["author"]) and is_array($rssdata["author"]) and isset($rssdata["author"]['name'])) {
                $rssdata["author"] = $rssdata["author"]['name'];
            }if (isset($rssdata["author"]) and is_array($rssdata["author"])) {
                $rssdata["author"] = implode(",", $rssdata["author"]);
            }

            if (isset($rssdata["category"])) {

                if (is_array($rssdata["category"])) {
                    $cat_array = array();
                    foreach ($rssdata["category"] as $kc => $category) {

                        if (is_array($category)) {
                            if (isset($category['value']))
                                $cat_array[] = $category['value'];
                            else if (isset($category['term']))
                                $cat_array[] = $category['term'];
                        }else {
                            $cat_array[] = $category;
                        }
                    }
                    $rssdata["category"] = implode(",", $cat_array);
                }


                $rssdata["category"] = $rssdata["category"];
            }


            $items = array();
            foreach ($array AS $key => $value) {

                if (isset($rssdata[$value]))
                    $items[$value] = $rssdata[$value];
            }



            if (!empty($items))
                $rss_items_array[] = $items;
        }



        return $rss_items_array;
    }

    function get_curl_data($url) {

        Configure::write('debug', 0);
        //$ua = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';
        $ua = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url); // The URL to fetch. This can also be set when initializing a session with curl_init().
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // The number of seconds to wait while trying to connect.
        curl_setopt($ch, CURLOPT_USERAGENT, $ua); // The contents of the "User-Agent: " header to be used in a HTTP request.
        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE); // To fail silently if the HTTP code returned is greater than or equal to 400.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // To follow any "Location: " header that the server sends as part of the HTTP header.
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE); // To automatically set the Referer: field in requests where it follows a Location: redirect.
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); // The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($ch, CURLOPT_MAXREDIRS, 0); // The maximum number of redirects

        $result = trim(curl_exec($ch));

        curl_close($ch);

        if (empty($result)) {
            $url = str_replace(' ', '%20', $url);
            $result = trim(file_get_contents($url));
        }

        return $result;
    }

    function get_http_response_code($url) {

        ini_set('user_agent', 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.0.16) Gecko/2009121601 Ubuntu/9.04 (jaunty) Firefox/3.0.16');

        $banurl = $this->banurl;

        if (in_array($url, $banurl, true)) {
            return '404';
        }

        stream_context_set_default(
                array(
                    'http' => array(
                        'timeout' => 20
                    )
                )
        );
        $return_404 = '404';

        if (empty($url)) {
            return '404';
        }

        //$executeTime = ini_get('max_execution_time'); 

        $headers = @get_headers($url);
        //ini_set('max_execution_time', $executeTime);


        if (empty($headers)) {
            return $return_404 = '404';
        }
        $return_404 = substr($headers[0], 9, 3);

        if ($return_404 == '500')
            $return_404 = '404';



        return $return_404;
    }

    /* mail send function */

    function rssmore_sending_mail() {

        date_default_timezone_set('UTC');
        $this->autoLayout = false;
        $this->autoRender = false;
        $SITE_URL = 'http://specificfeeds.com';
        $cron_id = 5;
        $days_bak_time = strtotime("-5 hour");
        $logdate = date('d-m-Y');
        $this->cron_start_status($cron_id, 'rssfeed_type_eight_send_single_email_' . $logdate);

        CakeLog::write('rssfeed_type_eight_send_single_email_' . $logdate, 'Cron Start' . "\n\t\r");


        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    ),
                    'belongsTo' =>
                    array(
                        'User'
                    )
                )
        );


        $this->Feed->bindModel(
                array(
                    'hasMany' =>
                    array(
                        'RssmoreFeedData' =>
                        array(
                            'className' => 'RssmoreFeedData',
                            'conditions' => array('RssmoreFeedData.server_createtime >' => "$days_bak_time"),
                            'order' => array('RssmoreFeedData.id DESC'),
                            'foreignKey' => 'feed_id',
                            'limit' => 20
                        )
                    )
                )
        );


        $feed_data = $this->Feed->find('all', array(
            'conditions' => array('Feed.feed_type' => 8, 'Feed.status' => 1),
            'fields' => array('Feed.id', 'Feed.title'),
            'order' => array('Feed.id ASC')
                )
        );

        $joins = array();
        $joins[] = array(
            'table' => 'users',
            'alias' => 'User',
            'type' => 'LEFT',
            'conditions' => array(
                'User.id = Subscriber.user_id'
            )
        );


        if (!empty($feed_data)) {  //check feed found  
            foreach ($feed_data as $feeddata) {

                $feed_id = $feeddata['Feed']['id'];
                $feed_title = $feeddata['Feed']['title'];
                $rssmoredata = $feeddata['RssmoreFeedData'];


                if (!empty($rssmoredata)) {   //if rss data found     
                    //print_r($feeddata); 
                    $conditions = array(
                        'Subscriber.feed_id' => $feed_id,
                        'Subscriber.type' => 1,
                        'User.status' => 1,
                    );
                    if (!empty($this->userids)) {
                        $conditions['Subscriber.user_id'] = $this->userids;
                    }

                    //$conditions['Subscriber.last_execution_time <  '] = time()-(60*60);   
                    $rss_more_users = $this->Subscriber->find('all', array(
                        'conditions' => $conditions,
                        'fields' => array(
                            'Subscriber.id',
                            'Subscriber.feed_id',
                            'Subscriber.rssfeed_name',
                            'Subscriber.rssfeed_keywords',
                            'Subscriber.rssfeed_is_all_keyword_match',
                            'Subscriber.rssfeed_keyword_searching_place',
                            'Subscriber.rssfeed_must_not_keywords',
                            'Subscriber.rssfeed_must_not_keyword_searching_place',
                            'Subscriber.rssfeed_is_must_not_contain_keyword_and',
                            'Subscriber.rssfeed_must_include_tags',
                            'Subscriber.rssfeed_is_must_include_all_tags',
                            'Subscriber.rssfeed_must_not_include_tags',
                            'Subscriber.rssfeed_is_must_not_contain_tag_and',
                            'Subscriber.rssfeed_authors',
                            'Subscriber.createtime',
                            'User.id',
                            'User.email',
                            'User.status',
                        ),
                        'order' => array('User.id ASC'),
                        'joins' => $joins
                            )
                    );
                    if (!empty($rss_more_users)) {   //user data found  
                        foreach ($rss_more_users as $morefeed_user) {

                            $subscriber_data = array(
                                'subscriber_id' => $morefeed_user['Subscriber']['id'],
                                'feed_id' => $morefeed_user['Subscriber']['feed_id'],
                                'rssfeed_name' => stripslashes($morefeed_user['Subscriber']['rssfeed_name']),
                                'rssfeed_is_all_keyword_match' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_all_keyword_match']),
                                'rssfeed_keyword_searching_place' => stripslashes($morefeed_user['Subscriber']['rssfeed_keyword_searching_place']),
                                'rssfeed_keywords' => stripslashes($morefeed_user['Subscriber']['rssfeed_keywords']),
                                'rssfeed_must_not_keywords' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_keywords']),
                                'rssfeed_must_not_keyword_searching_place' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_keyword_searching_place']),
                                'rssfeed_is_must_not_contain_keyword_and' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_not_contain_keyword_and']),
                                'rssfeed_must_include_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_include_tags']),
                                'rssfeed_is_must_include_all_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_include_all_tags']),
                                'rssfeed_is_must_not_contain_tag_and' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_not_contain_tag_and']),
                                'rssfeed_must_not_include_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_include_tags']),
                                'rssfeed_authors' => stripslashes($morefeed_user['Subscriber']['rssfeed_authors']),
                                'createtime' => $morefeed_user['Subscriber']['createtime'],
                                'user_id' => $morefeed_user['User']['id'],
                                'feed_title' => $feed_title,
                                'email' => $morefeed_user['User']['email']
                            );



                            CakeLog::write('rssfeed_type_eight_send_single_email_' . $logdate, 'User Process Data (' . $morefeed_user['User']['email'] . ')  : Subscription_id-' . $morefeed_user['Subscriber']['id'] . "\n\t\r");   //log


                            if (!empty($rssmoredata))
                                $this->set_single_email_data($subscriber_data, $rssmoredata);
                            else
                                CakeLog::write('rssfeed_type_eight_send_single_email_' . $logdate, 'Data Empty (' . $morefeed_user['User']['email'] . ')  : Subscription_id-' . $morefeed_user['Subscriber']['id'] . "\n\t\r");   //log
                        }
                    } //end if of user data  found    
                } //end if rss data found     
            } //end main for each 
        } //end if block to check feed found     




        $this->cron_update_status($cron_id);
        CakeLog::write('rssfeed_type_eight_send_single_email_' . $logdate, 'Cron End' . "\n\t\r");
        //$log = $this->Subscriber->getDataSource()->getLog(false, false);
        // debug($log); 
        //exit; 
    }

    function arraycase(array $array, $case) {
        switch (strtolower($case)) {
            case 'lower':
                $newarray = unserialize(strtolower(serialize($array)));
                break;
            case 'upper':
// using same method as 'lower' doesn't work
//$newarray = unserialize(strtoupper(serialize($array)));
// flip it, change it, flip it back
                $newarray = array_flip($array);
                $newarray = array_flip(array_change_key_case($newarray, CASE_UPPER));
                break;
            case 'first':
// this doesn't work
                $newarray = unserialize(ucfirst(serialize($array)));
                break;
            case 'words':
// this doesn't work
                $newarray = unserialize(ucwords(serialize($array)));
                break;
            default:
// if they don't specifiy a case, be nice and give them their array back
                $newarray = $array;
                break;
        }
        return $newarray;
    }

    function update_last_execution_time($subscription_id) {

        $this->Subscriber->updateAll(
                array("Subscriber.last_execution_time" => time()), array("Subscriber.id" => $subscription_id)
        );
    }

    function set_single_email_data($subscriber_data = null, $RssmoreFeedDatas = null, $feedtitle = null) {


        $logdate = date('d-m-Y');
        $rssfeed_is_all_keyword_match = $subscriber_data['rssfeed_is_all_keyword_match'];
        $rssfeed_keyword_searching_place = $subscriber_data['rssfeed_keyword_searching_place'];
        $rssfeed_is_must_not_contain_keyword_and = $subscriber_data['rssfeed_is_must_not_contain_keyword_and'];
        $rssfeed_must_not_keyword_searching_place = $subscriber_data['rssfeed_must_not_keyword_searching_place'];
        $rssfeed_is_must_include_all_tags = $subscriber_data['rssfeed_is_must_include_all_tags'];
        $rssfeed_is_must_not_contain_tag_and = $subscriber_data['rssfeed_is_must_not_contain_tag_and'];

        $rssfeed_keywords = $subscriber_data['rssfeed_keywords'];
        $rssfeed_must_not_keywords = $subscriber_data['rssfeed_must_not_keywords'];
        $rssfeed_must_include_tags = $subscriber_data['rssfeed_must_include_tags'];
        $rssfeed_must_not_include_tags = $subscriber_data['rssfeed_must_not_include_tags'];
        $rssfeed_authors = $subscriber_data['rssfeed_authors'];

        $rssfeedsub_createtime = (int) $subscriber_data['createtime'];

        $subscriber_id = $subscriber_data['subscriber_id'];

        $this->update_last_execution_time($subscriber_id);

        $keywordarr = array();
        $keyword_not_arr = array();
        $rssfeed_must_include_tags_arr = array();
        $rssfeed_must_not_include_tags = array();

        if (!empty($rssfeed_keywords))
            $keywordarr = explode(",", $rssfeed_keywords);

        if (!empty($rssfeed_must_not_keywords))
            $keyword_not_arr = explode(",", $rssfeed_must_not_keywords);

        if (!empty($rssfeed_must_include_tags))
            $rssfeed_must_include_tags_arr = explode(",", $rssfeed_must_include_tags);

        if (!empty($rssfeed_must_not_include_tags))
            $rssfeed_must_not_include_tags_arr = explode(",", $rssfeed_must_not_include_tags);

        if (!empty($rssfeed_authors))
            $rssfeed_authors_arr = explode(",", $rssfeed_authors);



        if (!empty($RssmoreFeedDatas)) {

            foreach ($RssmoreFeedDatas as $key => $RssmoreFeedData) {

                //$RssmoreFeedData = $RssmoreFeedData['RssmoreFeedData'];
                $rssmore_id = $RssmoreFeedData['id'];
                $rssmore_server_createtime = $RssmoreFeedData['createtime'];


                if ($rssmore_server_createtime < $rssfeedsub_createtime) {
                    unset($RssmoreFeedDatas[$key]);
                    continue;
                }

                $checkid = $this->RssmoreFeedTrack->find('count', array('conditions' => array('RssmoreFeedTrack.rssmore_id' => $rssmore_id, 'RssmoreFeedTrack.subscription_id' => $subscriber_id)));

                if ($checkid > 0) {
                    unset($RssmoreFeedDatas[$key]);
                    continue;
                }

                $rssfeedtitle = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags($RssmoreFeedData['title']))));
                $rssfeeddesc = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags((string) $RssmoreFeedData['description']))));
                $RssmoreFeedData['category'] = $this->arraycase(explode(",", $RssmoreFeedData['category']), 'lower');
                //Start Conditions check    





                $include_tag_found = '';
                if (!empty($rssfeed_must_include_tags_arr)) {  //start conditions must include tags
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $include_tag_found = 'notfound';

                    if ($rssfeed_is_must_include_all_tags == '2') {
                        foreach ($rssfeed_must_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) and is_array($RssmoreFeedData['category']) and ! empty($keyword)) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $continue_keyword = false;
                                    if ($include_tag_found == 'notfound')
                                        $include_tag_found = 'found';
                                }
                            }
                        }
                    }else {
                        foreach ($rssfeed_must_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) && is_array($RssmoreFeedData['category'])) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $keyword_found++;
                                    $continue_keyword = false;
                                    $include_tag_found = 'found';
                                }
                            }
                        }

                        if (($keyword_found) != count($rssfeed_must_include_tags_arr)) {
                            $continue_keyword = true;
                        }
                    }


                    if ($continue_keyword == true) {
                        //unset($RssmoreFeedDatas[$key]);
                        // continue;
                    }
                } //end conditions must include tags

                $not_include_tag_found = '';
                if (!empty($rssfeed_must_not_include_tags_arr)) {  //start conditions 
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $not_include_tag_found = 'notfound';

                    // if($rssfeed_is_must_not_contain_tag_and=='1'){
                    if (true) {
                        foreach ($rssfeed_must_not_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) and is_array($RssmoreFeedData['category']) and ! empty($keyword)) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $continue_keyword = false;
                                    $not_include_tag_found = 'found';
                                }
                            }
                        }
                    } else {

                        foreach ($rssfeed_must_not_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) && is_array($RssmoreFeedData['category'])) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $keyword_found++;
                                    $continue_keyword = false;
                                    $not_include_tag_found = 'found';
                                }
                            }
                        }
                        if (($keyword_found) != count($rssfeed_must_not_include_tags_arr)) {
                            $continue_keyword = true;
                            $not_include_tag_found = 'notfound';
                        } else {
                            $continue_keyword = false;
                            $not_include_tag_found = 'found';
                        }
                    }


                    if ($continue_keyword == false) {
                        //unset($RssmoreFeedDatas[$key]);
                        //continue;
                    }
                } //end conditions 


                $continue_keyword = true;
                $keyword_found = 0;
                $keyword_data_found = '';
                if (!empty($keywordarr)) {
                    $keyword_data_found = 'notfound';
                    if ($rssfeed_is_all_keyword_match == 'N') {

                        foreach ($keywordarr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            $feed_inner_info = array();

                            if ($rssfeed_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false || customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_data_found = 'found';
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_data_found = 'found';
                                }
                            }
                        }
                    } else {


                        foreach ($keywordarr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            if ($rssfeed_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                } else if (customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            }
                        }

                        if (($keyword_found) != count($keywordarr)) {
                            $continue_keyword = true;
                            $keyword_data_found = 'notfound';
                        } else {
                            $keyword_data_found = 'found';
                        }
                    }


                    if ($continue_keyword == true) {

                        // unset($RssmoreFeedDatas[$key]);
                        // continue;
                    }
                }

                $not_keyword_data_found = '';
                if (!empty($keyword_not_arr)) {   //start conditions keyword must not
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $not_keyword_data_found = 'notfound';
                    // if($rssfeed_is_must_not_contain_keyword_and=='1'){
                    if (true) {

                        foreach ($keyword_not_arr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            $feed_inner_info = array();

                            if ($rssfeed_must_not_keyword_searching_place == '2') {

                                if (customStrPosWord($rssfeedtitle, $keyword) !== false || customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $not_keyword_data_found = 'found';
                                }
                            } else {

                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $not_keyword_data_found = 'found';
                                }
                            }
                        }
                    } else {


                        foreach ($keyword_not_arr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            if ($rssfeed_must_not_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                } else if (customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            }
                        }

                        if (($keyword_found) != count($keyword_not_arr)) {
                            $continue_keyword = true;
                        } else {
                            $continue_keyword = false;
                        }
                    }


                    if ($continue_keyword == false) {
                        // unset($RssmoreFeedDatas[$key]);
                        //  continue;
                    }
                }    //end conditions keyword must not

                $author_found = '';

                if (!empty($rssfeed_authors_arr)) {
                    $continue_keyword = true;
                    $author_found = 'notfound';
                    foreach ($rssfeed_authors_arr as $keyword) {
                        $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                        if (!empty($RssmoreFeedData['author'])) {
                            $RssmoreFeedData['author'] = $this->arraycase(explode(",", $RssmoreFeedData['author']), 'lower');
                            if (!empty($RssmoreFeedData['author']) && is_array($RssmoreFeedData['author'])) {

                                if (in_array($keyword, $RssmoreFeedData['author'])) {
                                    $continue_keyword = false;
                                    $author_found = 'found';
                                }
                            }
                        }
                    }

                    if ($continue_keyword == true) {
                        //unset($RssmoreFeedDatas[$key]);
                        //continue;
                    }
                }


                //$include_tag_found
                //$not_include_tag_found
                //$keyword_data_found
                //$not_keyword_data_found
                //$author_found



                $fisrt_and_or = $rssfeed_is_must_not_contain_tag_and;
                $secnd_and_or = $rssfeed_is_must_not_contain_keyword_and;
                // echo "<br />";

                /*
                  echo "<br />Title : " . $RssmoreFeedDatas[$key]['title'];
                  echo "<br />include_tag_found : " . $include_tag_found;
                  echo "<br />not_include_tag_found : " . $not_include_tag_found;
                  echo "<br />keyword_data_found : " . $keyword_data_found;
                  echo "<br />not_keyword_data_found : " . $not_keyword_data_found;
                  echo "<br />author_found : " . $author_found;
                  echo "<br />$fisrt_and_or==$secnd_and_or<br />";
                 */

                if ($fisrt_and_or == 1 and $secnd_and_or == 1) {

                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } elseif ($include_tag_found == 'notfound' or $keyword_data_found == 'notfound' or $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 2 and $secnd_and_or == 1) {




                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found' and $keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'found' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'found' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 1 and $secnd_and_or == 2) {

                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' or $keyword_data_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 2 and $secnd_and_or == 2) {

                    if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == 'notfound') {    //added for or
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                }


                //End Conditions check
                $idsarray[] = $RssmoreFeedData['id'];
            }



            //echo "<pre>";
            // print_r(count($RssmoreFeedDatas));
            //  print_r($RssmoreFeedDatas);

            $subscription_id = $subscriber_data['subscriber_id'];
            $feed_id = $subscriber_data['feed_id'];
            $user_id = $subscriber_data['user_id'];

            $title = $subscriber_data['feed_title'];


            $unsubscribe_link = $this->mysiteurl . "feeds/unsubscribefeed/$feed_id/$user_id/$subscription_id";

            $key = base64_encode("userid=$user_id&feed_id=$feed_id&subscription_id=$subscription_id");
            $mysubs = $this->mysiteurl . "pages/editmyfeed/$key";


            $maildata['feed_id'] = $feed_id;
            $maildata['user_id'] = $user_id;

            $maildata['heading'] = $title;
            $maildata['name'] = $title;
            $maildata['manage_subs'] = $this->mysiteurl . "users/mysubscription";
            $maildata['edit_subs'] = $mysubs;
            $maildata['unsubscribe_link'] = $unsubscribe_link;

            $mktimevalue = time();
            $maildata['mktimevalue'] = $mktimevalue;

            $email = $subscriber_data['email'];
            $email22 = 'richard@123789.org';
            $subject = stripslashes('New: message from feed "' . $title . '"');

            if (!empty($RssmoreFeedDatas) and $this->send_email_new($maildata, $RssmoreFeedDatas, $email, $subject)) {

                if ($user_id == '21' or $user_id == '2249' or $user_id == '902' or $user_id == '20480' or $user_id == '20482' or $user_id == '3465' or $user_id == '3471' or $user_id == '2511' or $user_id == '20481') {
                    //$this->send_email_new($maildata, $RssmoreFeedDatas, $email, $subject);
                    // $this->send_email_new($maildata, $RssmoreFeedDatas, $email22, $subject . $user_id);
                }
                //$this->send_email_new($maildata, $RssmoreFeedDatas, $email22, $subject);

                foreach ($idsarray as $mess_id) {
                    $data_arr[] = array();
                    $data_arr['RssmoreFeedTrack']['subscription_id'] = $subscription_id;
                    $data_arr['RssmoreFeedTrack']['rssmore_id'] = $mess_id;
                    $data_arr['RssmoreFeedTrack']['createtime'] = time();
                    $this->RssmoreFeedTrack->create();
                    $this->RssmoreFeedTrack->save($data_arr);
                    $this->add_message_sent_data($mess_id, $feed_id, $user_id, '1', $subscription_id);
                }
                $this->add_openrates_data($feed_id, $user_id, 'S', '8', $mktimevalue);



                CakeLog::write('rssfeed_type_eight_send_single_email_' . $logdate, 'User Mail Sent (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
            } else {
                CakeLog::write('rssfeed_type_eight_send_single_email_' . $logdate, 'Data Empty (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
            }
        } else {
            CakeLog::write('rssfeed_type_eight_send_single_email_' . $logdate, 'Data Empty (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
        }
    }

    function send_email($maildata = null, $feeddata, $email, $subject) {

        $this->autoLayout = false;
        $this->autoRender = false;
        //$this->Email->reset();
        $this->Email->from = "SpecificFeeds <noreply@specificfeeds.com>";
        $this->Email->to = $email;
        $this->Email->subject = $subject;
        $this->Email->sendAs = 'html';
        /* SMTP Options */
        $this->Email->smtpOptions = array(
            'port' => SMTP_PORT,
            'timeout' => SMTP_TIMEOUT,
            'host' => SMTP_HOST,
            'username' => SMTP_USERNAME,
            'password' => SMTP_PASSWORD
        );
        /* Set delivery method */

        $this->set('maildata', $maildata);
        $this->set('feeddata', $feeddata);
        $this->Email->delivery = 'smtp';
        $this->Email->template = 'rssmorefeed_single';
        $this->Email->layout = 'single_email';
        if ($this->Email->send()) {
            return true;
        } else {
            return false;
        }
    }

    function send_email_new($maildata = null, $feeddata, $email, $subject) {

        $this->autoLayout = false;
        $this->autoRender = false;
        //$this->Email->reset();
        $this->Email->from = "SpecificFeeds <noreply@specificfeeds.com>";
        $this->Email->to = $email;
        $this->Email->subject = $subject;
        $this->Email->sendAs = 'html';
        /* SMTP Options */
        $this->Email->smtpOptions = array(
            'port' => SMTP_PORT,
            'timeout' => SMTP_TIMEOUT,
            'host' => SMTP_HOST,
            'username' => SMTP_USERNAME,
            'password' => SMTP_PASSWORD
        );
        /* Set delivery method */
        $this->set('site_url_img', 'http://www.specificfeeds.com/theme/classic/');
        $this->set('maildata', $maildata);
        $this->set('feeddata', $feeddata);
        $this->Email->delivery = 'smtp';
        $this->Email->template = 'template2014/rssmorefeed_single_new';
        //$this->Email->template = 'template2014/rssmorefeed_single_descr';
        $this->Email->layout = 'layout2014/single_email_layout';
        if ($this->Email->send()) {
            return true;
        } else {
            return false;
        }
    }

    function rssmore_set_newspaper_data() {

        date_default_timezone_set('UTC');
        $this->autoLayout = false;
        $this->autoRender = false;
        $SITE_URL = 'http://specificfeeds.com';
        $cron_id = 6;
        $days_bak_time = strtotime("-1 day");
        $logdate = date('d-m-Y');
        $this->cron_start_status($cron_id, 'rssfeed_type_eight_set_newspaper_' . $logdate);

        CakeLog::write('rssfeed_type_eight_set_newspaper_' . $logdate, 'Cron Start' . "\n\t\r");


        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    ),
                    'belongsTo' =>
                    array(
                        'User'
                    )
                )
        );


        $this->Feed->bindModel(
                array(
                    'hasMany' =>
                    array(
                        'RssmoreFeedData' =>
                        array(
                            'className' => 'RssmoreFeedData',
                            'conditions' => array('RssmoreFeedData.server_createtime >' => "$days_bak_time"),
                            'order' => array('RssmoreFeedData.id DESC'),
                            'foreignKey' => 'feed_id',
                            'limit' => 50
                        )
                    )
                )
        );

        $feed_data = $this->Feed->find('all', array(
            'conditions' => array('Feed.feed_type' => 8, 'Feed.status' => 1),
            'fields' => array('Feed.id', 'Feed.title'),
            'order' => array('Feed.id ASC')
                )
        );



        $joins = array();
        $joins[] = array(
            'table' => 'users',
            'alias' => 'User',
            'type' => 'LEFT',
            'conditions' => array(
                'User.id = Subscriber.user_id'
            )
        );

        $joins[] = array(
            'table' => 'feeds',
            'alias' => 'Feed',
            'type' => 'LEFT',
            'conditions' => array(
                'Feed.id = Subscriber.feed_id'
            )
        );

        $joins[] = array(
            'table' => 'newspapers',
            'alias' => 'Newspaper',
            'type' => 'LEFT',
            'conditions' => array(
                'Newspaper.user_id = Subscriber.user_id'
            )
        );
        $joins[] = array(
            'table' => 'timezones',
            'alias' => 'Timezone',
            'type' => 'LEFT',
            'conditions' => array(
                'Timezone.id = User.timezone'
            )
        );


        if (!empty($feed_data)) {  //check feed found  
            foreach ($feed_data as $feeddata) {

                $feed_id = $feeddata['Feed']['id'];
                $feed_title = $feeddata['Feed']['title'];
                $rssmoredata = $feeddata['RssmoreFeedData'];


                if (!empty($rssmoredata)) {   //if rss data found     
                    $conditions = array(
                        'Subscriber.feed_id' => $feed_id,
                        'Subscriber.type' => 2,
                        'User.status' => 1,
                    );
                    if (!empty($this->userids)) {
                        $conditions['Subscriber.user_id'] = $this->userids;
                    }
                    // $conditions['Subscriber.last_execution_time <  '] = time()-(60*60);    
                    $rss_more_users = $this->Subscriber->find('all', array(
                        'conditions' => $conditions,
                        'fields' => array(
                            'Subscriber.id',
                            'Subscriber.feed_id',
                            'Subscriber.rssfeed_name',
                            'Subscriber.rssfeed_keywords',
                            'Subscriber.rssfeed_is_all_keyword_match',
                            'Subscriber.rssfeed_keyword_searching_place',
                            'Subscriber.rssfeed_must_not_keywords',
                            'Subscriber.rssfeed_must_not_keyword_searching_place',
                            'Subscriber.rssfeed_is_must_not_contain_keyword_and',
                            'Subscriber.rssfeed_must_include_tags',
                            'Subscriber.rssfeed_is_must_include_all_tags',
                            'Subscriber.rssfeed_must_not_include_tags',
                            'Subscriber.rssfeed_is_must_not_contain_tag_and',
                            'Subscriber.rssfeed_authors',
                            'Subscriber.createtime',
                            'Subscriber.last_execution_time',
                            'User.id',
                            'User.email',
                            'User.status',
                            'Newspaper.delivery_type',
                            'Newspaper.time',
                            'Newspaper.weekday',
                            'Newspaper.month_date',
                            'Newspaper.year_date',
                            'Newspaper.month',
                            'Timezone.value'
                        ),
                        'order' => array('Subscriber.last_execution_time ASC', 'Subscriber.id DESC'),
                        'joins' => $joins
                            )
                    );

                    if (!empty($rss_more_users)) {   //user data found   
                        foreach ($rss_more_users as $morefeed_user) {

                            $subscriber_data = array(
                                'subscriber_id' => $morefeed_user['Subscriber']['id'],
                                'feed_id' => $morefeed_user['Subscriber']['feed_id'],
                                'rssfeed_name' => stripslashes($morefeed_user['Subscriber']['rssfeed_name']),
                                'rssfeed_is_all_keyword_match' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_all_keyword_match']),
                                'rssfeed_keyword_searching_place' => stripslashes($morefeed_user['Subscriber']['rssfeed_keyword_searching_place']),
                                'rssfeed_keywords' => stripslashes($morefeed_user['Subscriber']['rssfeed_keywords']),
                                'rssfeed_must_not_keywords' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_keywords']),
                                'rssfeed_must_not_keyword_searching_place' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_keyword_searching_place']),
                                'rssfeed_is_must_not_contain_keyword_and' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_not_contain_keyword_and']),
                                'rssfeed_must_include_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_include_tags']),
                                'rssfeed_is_must_include_all_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_include_all_tags']),
                                'rssfeed_is_must_not_contain_tag_and' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_not_contain_tag_and']),
                                'rssfeed_must_not_include_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_include_tags']),
                                'rssfeed_authors' => stripslashes($morefeed_user['Subscriber']['rssfeed_authors']),
                                'createtime' => $morefeed_user['Subscriber']['createtime'],
                                'user_id' => $morefeed_user['User']['id'],
                                'feed_title' => $feed_title,
                                'email' => $morefeed_user['User']['email']
                            );

                            $last_execution_time = $morefeed_user['Subscriber']['last_execution_time'];


                            $time = !empty($morefeed_user['Newspaper']['time']) ? $morefeed_user['Newspaper']['time'] : 8;
                            $month_date = !empty($morefeed_user['Newspaper']['month_date']) ? $morefeed_user['Newspaper']['month_date'] : 1;
                            $weekday = !empty($morefeed_user['Newspaper']['weekday']) ? $morefeed_user['Newspaper']['weekday'] : 1;
                            $year_date = !empty($morefeed_user['Newspaper']['year_date']) ? $morefeed_user['Newspaper']['year_date'] : 1;
                            $month = !empty($morefeed_user['Newspaper']['month']) ? $morefeed_user['Newspaper']['month'] : 1;

                            $timezone = $morefeed_user['Timezone']['value'];
                            //$delivery_type = $morefeed_user['Newspaper']['delivery_type'];
                            $delivery_type = !empty($morefeed_user['Newspaper']['delivery_type']) ? $morefeed_user['Newspaper']['delivery_type'] : 1;


                            $send_status = false;
                            if (!empty($timezone)) {
                                $timezone = str_replace(":", '.', $timezone);
                                $timezone_arr = explode(".", $timezone);
                                $timezone_arr[1] = ($timezone_arr[1] * 100) / 60;
                                $timezone = $timezone_arr[0] . "." . $timezone_arr[1];
                                $timeAfterTimeZone = time() + ($timezone) * 60 * 60;
                            } else {
                                $timeAfterTimeZone = time();
                            }

                            $now_day = date('d', $timeAfterTimeZone);
                            $now_week_day = date('l', $timeAfterTimeZone);
                            $now_month = date('m', $timeAfterTimeZone);
                            $now_year = date('Y', $timeAfterTimeZone);

                            $current_hour = date('G', ($timeAfterTimeZone + 3600));
                            $current_week = date('N', $timeAfterTimeZone);
                            $current_day = date('j', $timeAfterTimeZone);
                            $current_month = date('n', $timeAfterTimeZone);
                            $current_date = date('d-m-Y', $timeAfterTimeZone);



                            if ($delivery_type == '1' && $time == $current_hour) {
                                $send_status = true;
                            } elseif ($delivery_type == '2' && $weekday == $current_week && $time == $current_hour) {
                                $send_status = true;
                            } elseif ($delivery_type == '3' && $month_date == $current_day && $time == $current_hour) {
                                $send_status = true;
                            } else {
                                $send_status = true;
                            }

                            if ($send_status == false)
                                continue;




                            CakeLog::write('rssfeed_type_eight_set_newspaper_' . $logdate, 'User Process Data (' . $morefeed_user['User']['email'] . ')  : Subscription_id-' . $morefeed_user['Subscriber']['id'] . "\n\t\r");   //log


                            if (!empty($rssmoredata))
                                $this->set_newspaper_data($subscriber_data, $rssmoredata);
                            else
                                CakeLog::write('rssfeed_type_eight_set_newspaper_' . $logdate, 'Data Empty (' . $morefeed_user['User']['email'] . ')  : Subscription_id-' . $morefeed_user['Subscriber']['id'] . "\n\t\r");   //log
                        }
                    } //end if of user data  found    
                } //end if rss data found     
            } //end main for each 
        } //end if block to check feed found     




        $this->cron_update_status($cron_id);
        CakeLog::write('rssfeed_type_eight_set_newspaper_' . $logdate, 'Cron End' . "\n\t\r");
        //$log = $this->Subscriber->getDataSource()->getLog(false, false);
        // debug($log);
        // exit; 
    }

    function set_newspaper_data($subscriber_data = null, $RssmoreFeedDatas = null, $feedtitle = null) {

        $logdate = date('d-m-Y');
        $rssfeed_is_all_keyword_match = $subscriber_data['rssfeed_is_all_keyword_match'];
        $rssfeed_keyword_searching_place = $subscriber_data['rssfeed_keyword_searching_place'];
        $rssfeed_is_must_not_contain_keyword_and = $subscriber_data['rssfeed_is_must_not_contain_keyword_and'];
        $rssfeed_must_not_keyword_searching_place = $subscriber_data['rssfeed_must_not_keyword_searching_place'];
        $rssfeed_is_must_include_all_tags = $subscriber_data['rssfeed_is_must_include_all_tags'];
        $rssfeed_is_must_not_contain_tag_and = $subscriber_data['rssfeed_is_must_not_contain_tag_and'];

        $rssfeed_keywords = $subscriber_data['rssfeed_keywords'];
        $rssfeed_must_not_keywords = $subscriber_data['rssfeed_must_not_keywords'];
        $rssfeed_must_include_tags = $subscriber_data['rssfeed_must_include_tags'];
        $rssfeed_must_not_include_tags = $subscriber_data['rssfeed_must_not_include_tags'];
        $rssfeed_authors = $subscriber_data['rssfeed_authors'];
        $rssfeedsub_createtime = (int) $subscriber_data['createtime'];

        $subscriber_id = $subscriber_data['subscriber_id'];

        $keywordarr = array();
        $keyword_not_arr = array();
        $rssfeed_must_include_tags_arr = array();
        $rssfeed_must_not_include_tags = array();

        if (!empty($rssfeed_keywords))
            $keywordarr = explode(",", $rssfeed_keywords);

        if (!empty($rssfeed_must_not_keywords))
            $keyword_not_arr = explode(",", $rssfeed_must_not_keywords);

        if (!empty($rssfeed_must_include_tags))
            $rssfeed_must_include_tags_arr = explode(",", $rssfeed_must_include_tags);

        if (!empty($rssfeed_must_not_include_tags))
            $rssfeed_must_not_include_tags_arr = explode(",", $rssfeed_must_not_include_tags);

        if (!empty($rssfeed_authors))
            $rssfeed_authors_arr = explode(",", $rssfeed_authors);



        if (!empty($RssmoreFeedDatas)) {

            foreach ($RssmoreFeedDatas as $key => $RssmoreFeedData) {

                $rssmore_server_createtime = $RssmoreFeedData['createtime'];

                if ($rssmore_server_createtime < $rssfeedsub_createtime) {
                    unset($RssmoreFeedDatas[$key]);
                    continue;
                }

                //$RssmoreFeedData = $RssmoreFeedData['RssmoreFeedData'];
                $rssmore_id = $RssmoreFeedData['id'];
                $checkid = $this->RssmoreFeedTrack->find('count', array('conditions' => array('RssmoreFeedTrack.rssmore_id' => $rssmore_id, 'RssmoreFeedTrack.subscription_id' => $subscriber_id)));

                if ($checkid > 0) {
                    unset($RssmoreFeedDatas[$key]);
                    continue;
                }

                $rssfeedtitle = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags($RssmoreFeedData['title']))));
                $rssfeeddesc = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags((string) $RssmoreFeedData['description']))));
                $RssmoreFeedData['category'] = $this->arraycase(explode(",", $RssmoreFeedData['category']), 'lower');
                //Start Conditions check

                $include_tag_found = '';
                if (!empty($rssfeed_must_include_tags_arr)) {  //start conditions must include tags
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $include_tag_found = 'notfound';
                    if ($rssfeed_is_must_include_all_tags == '2') {
                        foreach ($rssfeed_must_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            //if(!empty($RssmoreFeedData['category'])  && is_array($RssmoreFeedData['category'])){
                            if (!empty($RssmoreFeedData['category']) and is_array($RssmoreFeedData['category']) and ! empty($keyword)) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $continue_keyword = false;

                                    if ($include_tag_found == 'notfound')
                                        $include_tag_found = 'found';
                                }
                            }
                        }
                    }else {
                        foreach ($rssfeed_must_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) && is_array($RssmoreFeedData['category'])) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $keyword_found++;
                                    $continue_keyword = false;
                                    $include_tag_found = 'found';
                                }
                            }
                        }

                        if (($keyword_found) != count($rssfeed_must_include_tags_arr)) {
                            $continue_keyword = true;
                        }
                    }


                    if ($continue_keyword == true) {
                        //unset($RssmoreFeedDatas[$key]);
                        // continue;
                    }
                } //end conditions must include tags

                $not_include_tag_found = '';
                if (!empty($rssfeed_must_not_include_tags_arr)) {  //start conditions 
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $not_include_tag_found = 'notfound';

                    // if($rssfeed_is_must_not_contain_tag_and=='1'){
                    if (true) {
                        foreach ($rssfeed_must_not_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) && is_array($RssmoreFeedData['category'])) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $continue_keyword = false;
                                    $not_include_tag_found = 'found';
                                }
                            }
                        }
                    } else {

                        foreach ($rssfeed_must_not_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) && is_array($RssmoreFeedData['category'])) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $keyword_found++;
                                    $continue_keyword = false;
                                    $not_include_tag_found = 'found';
                                }
                            }
                        }
                        if (($keyword_found) != count($rssfeed_must_not_include_tags_arr)) {
                            $continue_keyword = true;
                            $not_include_tag_found = 'notfound';
                        } else {
                            $continue_keyword = false;
                            $not_include_tag_found = 'found';
                        }
                    }


                    if ($continue_keyword == false) {
                        //unset($RssmoreFeedDatas[$key]);
                        //continue;
                    }
                } //end conditions 


                $continue_keyword = true;
                $keyword_found = 0;
                $keyword_data_found = '';
                if (!empty($keywordarr)) {
                    $keyword_data_found = 'notfound';
                    if ($rssfeed_is_all_keyword_match == 'N') {

                        foreach ($keywordarr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            $feed_inner_info = array();

                            if ($rssfeed_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false || customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_data_found = 'found';
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_data_found = 'found';
                                }
                            }
                        }
                    } else {


                        foreach ($keywordarr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            if ($rssfeed_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                } else if (customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            }
                        }

                        if (($keyword_found) != count($keywordarr)) {
                            $continue_keyword = true;
                            $keyword_data_found = 'notfound';
                        } else {
                            $keyword_data_found = 'found';
                        }
                    }


                    if ($continue_keyword == true) {

                        // unset($RssmoreFeedDatas[$key]);
                        // continue;
                    }
                }

                $not_keyword_data_found = '';
                if (!empty($keyword_not_arr)) {   //start conditions keyword must not
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $not_keyword_data_found = 'notfound';
                    // if($rssfeed_is_must_not_contain_keyword_and=='1'){
                    if (true) {

                        foreach ($keyword_not_arr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            $feed_inner_info = array();

                            if ($rssfeed_must_not_keyword_searching_place == '2') {

                                if (customStrPosWord($rssfeedtitle, $keyword) !== false || customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $not_keyword_data_found = 'found';
                                }
                            } else {

                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $not_keyword_data_found = 'found';
                                }
                            }
                        }
                    } else {


                        foreach ($keyword_not_arr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            if ($rssfeed_must_not_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                } else if (customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            }
                        }

                        if (($keyword_found) != count($keyword_not_arr)) {
                            $continue_keyword = true;
                        } else {
                            $continue_keyword = false;
                        }
                    }


                    if ($continue_keyword == false) {
                        // unset($RssmoreFeedDatas[$key]);
                        //  continue;
                    }
                }    //end conditions keyword must not

                $author_found = '';
                if (!empty($rssfeed_authors_arr)) {
                    $continue_keyword = true;
                    $author_found = 'notfound';
                    foreach ($rssfeed_authors_arr as $keyword) {
                        $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                        if (!empty($RssmoreFeedData['author'])) {
                            $RssmoreFeedData['author'] = $this->arraycase(explode(",", $RssmoreFeedData['author']), 'lower');
                            if (!empty($RssmoreFeedData['author']) && is_array($RssmoreFeedData['author'])) {

                                if (in_array($keyword, $RssmoreFeedData['author'])) {
                                    $continue_keyword = false;
                                    $author_found = 'found';
                                }
                            }
                        }
                    }

                    if ($continue_keyword == true) {
                        //unset($RssmoreFeedDatas[$key]);
                        //continue;
                    }
                }


                //$include_tag_found
                //$not_include_tag_found
                //$keyword_data_found
                //$not_keyword_data_found
                //$author_found

                $fisrt_and_or = $rssfeed_is_must_not_contain_tag_and;
                $secnd_and_or = $rssfeed_is_must_not_contain_keyword_and;

                if ($fisrt_and_or == 1 and $secnd_and_or == 1) {

                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } elseif ($include_tag_found == 'notfound' or $keyword_data_found == 'notfound' or $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 2 and $secnd_and_or == 1) {

                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found' and $keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'found' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'found' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 1 and $secnd_and_or == 2) {

                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' or $keyword_data_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 2 and $secnd_and_or == 2) {

                    if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == 'notfound') {    //added for or
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                }

                //End Conditions check

                $idsarray[] = $RssmoreFeedData['id'];
            }



            // echo "<pre>";
            //print_r(count($RssmoreFeedDatas));
            //  print_r($RssmoreFeedDatas);

            $subscription_id = $subscriber_data['subscriber_id'];
            $feed_id = $subscriber_data['feed_id'];
            $user_id = $subscriber_data['user_id'];
            $rssfeed_name = 'Get messages from RSS feeds by Email';
            $title = $subscriber_data['feed_title'];





            $maildata['subscription_id'] = $subscription_id;
            $maildata['feed_id'] = $feed_id;
            $maildata['user_id'] = $user_id;
            $maildata['title'] = $title;


            $email = $subscriber_data['email'];
            // $email                        = 'richard@123789.org'; 


            if (!empty($RssmoreFeedDatas) and $this->prepare_data($maildata, $RssmoreFeedDatas)) {


                $this->update_last_execution_time($subscription_id);
                foreach ($idsarray as $mess_id) {
                    $data_arr[] = array();
                    $data_arr['RssmoreFeedTrack']['subscription_id'] = $subscription_id;
                    $data_arr['RssmoreFeedTrack']['rssmore_id'] = $mess_id;
                    $data_arr['RssmoreFeedTrack']['createtime'] = time();
                    $this->RssmoreFeedTrack->create();
                    $this->RssmoreFeedTrack->save($data_arr);
                    $this->add_message_sent_data($mess_id, $feed_id, $user_id, '2', $subscription_id);
                }




                CakeLog::write('rssfeed_type_eight_set_newspaper_' . $logdate, 'User Mail Sent (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
            } else {
                CakeLog::write('rssfeed_type_eight_set_newspaper_' . $logdate, 'Data Empty (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
            }
        } else {
            CakeLog::write('rssfeed_type_eight_set_newspaper_' . $logdate, 'Data Empty (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
        }
    }

    function prepare_data($newspaper_data, $feeddata) {
        ini_set('default_charset', 'utf-8');
        if ($feeddata) {


            $tempmesg = array();
            $tempmesg['Tempmessage']['user_id'] = $newspaper_data['user_id'];
            $tempmesg['Tempmessage']['feed_id'] = $newspaper_data['feed_id'];
            $tempmesg['Tempmessage']['subscription_id'] = $newspaper_data['subscription_id'];
            ;
            $tempmesg['Tempmessage']['title'] = $newspaper_data['title'] . " ";
            $tempmesg['Tempmessage']['status'] = '1';
            $mktimevalue = time();
            $tempmesg['Tempmessage']['createtime'] = $mktimevalue;
            $j = 1;
            $feed_link_array = array();
            $feed_title_array = array();
            $feed_id = $newspaper_data['feed_id'];
            $message_ids_arr = array();
            $this->add_openrates_data($feed_id, $newspaper_data['user_id'], 'N', '8', $mktimevalue);

            $temp_data = '<table width="100%" cellspacing="0" cellpadding="8" border="0" style="">';

            foreach ($feeddata as $feed) {
                $continue_keyword = false;
                $feed_title = utf8_decode(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags($feed['title']))));
                $feed_link = $feed['link'];

                $current_feed_link = strtoupper(dechex(crc32(stripslashes(trim($feed_link)))));

                if (empty($feed_title) && in_array($current_feed_link, $feed_link_array)) {
                    continue;
                }

                if (isset($feed_title_array[$feed_title])) {
                    continue;
                }

                $feed_title_array[$feed_title] = $feed_title;
                $message_id = $feed['id'];
                $message_ids_arr[] = $message_id;
                $feed_link_array[] = $feed_link;
                $feed_link = "http://www.specificfeeds.com/statistics/redirect_feed_link/" . $message_id . "/" . $feed_id . "/?urllink=" . $feed_link;

                $tr_bg_color = (($j % 2) == 0) ? "#fff" : "#F8F8F8";
                $j++;
                /* $temp_data .= '  <tr>
                  <td align="left" style="border-bottom:1px solid #dadada; ;background-color:'.$tr_bg_color.'; overflow: hidden; padding:5px 0 5px 20px;list-style: none;margin:0 !important;color:#333;">
                  <a style="color:#333; font-size:12px;text-decoration: underline;" href="'.$feed_link.'" target="_blank">
                  '.utf8_decode(trim(str_replace(array('“',"`"),array('""',"'"),strip_tags($feed_title)))) .'
                  </a>
                  </td>
                  </tr>'; */
                $temp_data .= "<tr style=\"background-color:$tr_bg_color\">";
                $temp_data .= "<td align=\"left\" style=\" border-top:1px solid #DADADA; padding-bottom:3px;\">";
                $temp_data .= '<a style="color: #333333;height: 33px;font-family: Arial,Helvetica,sans-serif; margin: 0 !important;overflow: hidden;font-size:16px;text-decoration: none;font-weight: bold;padding: 0 0 0 0px;" href="' . $feed_link . '" target="_blank">';
                $temp_data .= $feed_title;
                $temp_data .='</a>';
                $temp_data .= "</td>";
                $temp_data .= "</tr>";
            }

            $temp_data .= '</table>';


            $tempmesg['Tempmessage']['description'] = (($temp_data));
            $tempmesg['Tempmessage']['message_ids'] = implode(",", $message_ids_arr);


            if (!empty($tempmesg)) {

                $this->Tempmessage->create();
                if ($this->Tempmessage->save($tempmesg)) {
                    return true;
                } else {
                    return false;
                }
                //print_r($tempmesg) ;  
            }
        }
    }

//
    //
function add_track_rss_more_feed_id($fid) {

        date_default_timezone_set('UTC');
        ini_set('max_execution_time', -1);
//$this->autoLayout = false;
//$this->autoRender = false;
        $SITE_URL = 'http://specificfeeds.com';
        $cron_id = 21;
        $days_bak_time = strtotime("-2 hour");
        $logdate = date('d-m-Y');

//$this->cron_start_status($cron_id,'rssfeed_type_8_addlog_'.$logdate);

        CakeLog::write('rssfeed_type_8_addlog_' . $logdate, 'Cron Start' . "\n\t\r");


        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    ),
                    'belongsTo' =>
                    array(
                        'User'
                    )
                )
        );


        $this->Feed->bindModel(
                array(
                    'hasMany' =>
                    array(
                        'RssmoreFeedData' =>
                        array(
                            'className' => 'RssmoreFeedData',
                            'conditions' => array('RssmoreFeedData.move_status' => "N"),
                            'order' => array('RssmoreFeedData.id DESC'),
                            'foreignKey' => 'feed_id',
                            'limit' => 20
                        )
                    )
                )
        );


        $feed_data = $this->Feed->find('all', array(
            'conditions' => array('Feed.id' => $fid, 'Feed.status' => 1),
            'fields' => array('Feed.id', 'Feed.title', 'Feed.url'),
            'order' => array('Feed.id ASC')
                )
        );

        if (!empty($feed_data)) {  //check feed found  
            foreach ($feed_data as $feeddata) {

                $feed_id = $feeddata['Feed']['id'];
                $feed_title = $feeddata['Feed']['title'];
                $feed_url = $feeddata['Feed']['url'];
                $rssmoredata = $feeddata['RssmoreFeedData'];

                if (!empty($rssmoredata)) {
                    $this->add_track_data($rssmoredata, $feed_url);
                }
            } //endforeach $feed_data
        }//end if feeddata                              
//$this->cron_update_status($cron_id);   
        CakeLog::write('rssfeed_type_8_addlog_' . $logdate, 'End Start' . "\n\t\r");
    }

//
    function add_track_rss_more() {

        date_default_timezone_set('UTC');
        ini_set('max_execution_time', -1);
        $this->autoLayout = false;
        $this->autoRender = false;
        $SITE_URL = 'http://specificfeeds.com';
        $cron_id = 21;
        $days_bak_time = strtotime("-2 hour");
        $logdate = date('d-m-Y');

        $this->cron_start_status($cron_id, 'rssfeed_type_8_addlog_' . $logdate);

        CakeLog::write('rssfeed_type_8_addlog_' . $logdate, 'Cron Start' . "\n\t\r");


        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    ),
                    'belongsTo' =>
                    array(
                        'User'
                    )
                )
        );


        $this->Feed->bindModel(
                array(
                    'hasMany' =>
                    array(
                        'RssmoreFeedData' =>
                        array(
                            'className' => 'RssmoreFeedData',
                            'conditions' => array('RssmoreFeedData.move_status' => "N"),
                            'order' => array('RssmoreFeedData.id DESC'),
                            'foreignKey' => 'feed_id',
                            'limit' => 10
                        )
                    )
                )
        );


        $feed_data = $this->Feed->find('all', array(
            'conditions' => array('Feed.feed_type' => 8, 'Feed.status' => 1),
            'fields' => array('Feed.id', 'Feed.title', 'Feed.url'),
            'order' => array('Feed.id ASC')
                )
        );

        if (!empty($feed_data)) {  //check feed found  
            foreach ($feed_data as $feeddata) {

                $feed_id = $feeddata['Feed']['id'];
                $feed_title = $feeddata['Feed']['title'];
                $feed_url = $feeddata['Feed']['url'];
                $rssmoredata = $feeddata['RssmoreFeedData'];

                if (!empty($rssmoredata)) {
                    $this->add_track_data($rssmoredata, $feed_url);
                }
            } //endforeach $feed_data
        }//end if feeddata                              


        $this->cron_update_status($cron_id);
        CakeLog::write('rssfeed_type_8_addlog_' . $logdate, 'End Start' . "\n\t\r");
    }

    function add_track_data($rssmoredata, $url) {

        foreach ($rssmoredata as $rssfeed) {
            $message_history_id = $rssfeed['id'];
            $feed_id = $rssfeed['feed_id'];
            $title = $rssfeed['title'];
            $description = $rssfeed['description'];
            $link = $rssfeed['link'];
            $author = $rssfeed['author'];
            $category = $rssfeed['category'];
            $pubdate = $rssfeed['pubdate'];
            $createtime = $rssfeed['createtime'];
            $server_createtime = $rssfeed['server_createtime'];
            $user_id = $rssfeed['user_id'];

            $count = $this->RssmoreFeedstory->find('count', array('conditions' => array('RssmoreFeedstory.link' => "$link", 'RssmoreFeedstory.feed_id' => $feed_id)));

            if ($count > 0) {
                continue;
            }

            $trackarray = array();
            $trackarray['RssmoreFeedstory']['feed_id'] = $feed_id;
            $trackarray['RssmoreFeedstory']['url'] = $url;
            $trackarray['RssmoreFeedstory']['link'] = $link;
            $trackarray['RssmoreFeedstory']['title'] = $title;
            $trackarray['RssmoreFeedstory']['description'] = $description;
            $trackarray['RssmoreFeedstory']['author'] = trim((!empty($author)) ? $author : '');
            $trackarray['RssmoreFeedstory']['tags'] = trim((!empty($category)) ? $category : '');
            $trackarray['RssmoreFeedstory']['pubdate'] = $pubdate;
            $trackarray['RssmoreFeedstory']['pubdate_timestamp'] = $createtime;
            $trackarray['RssmoreFeedstory']['firsttime_flag'] = 'N';
            $trackarray['RssmoreFeedstory']['createtime'] = "$server_createtime";
            $trackarray['RssmoreFeedstory']['rss_more_id'] = $message_history_id;

            $this->RssmoreFeedstory->create();
            if ($this->RssmoreFeedstory->save($trackarray)) {

                $this->updateFeedStatus($message_history_id);
                $author_array = explode(",", $author);

                foreach ($author_array as $auname) {
                    $auname = trim($auname);
                    if (empty($auname))
                        continue;
                    $this->add_feed_author(trim($auname), $feed_id);
                }

                $category_array = explode(",", $category);
                foreach ($category_array as $tag) {
                    $tag = trim($tag);
                    if (empty($tag))
                        continue;
                    $this->add_feed_tags(trim($tag), $feed_id);
                }
            }
        }

        // $log = $this->Feed->getDataSource()->getLog(false, false);
//debug($log);
    }

    function updateFeedStatus($message_history_id) {

        $update_query = "update rssmore_feed_data set move_status = 'Y' where id = $message_history_id";
        $this->RssmoreFeedData->query($update_query);
        /*
          $this->RssmoreFeedData->updateAll(array('RssmoreFeedData.move_status'=>"Y"),
          array('RssmoreFeedData.id'=>$message_history_id)
          );

         */
    }

    function add_feed_author($author, $feed_id) {
        $count = $this->Rssfeedauthor->find('count', array('conditions' => array('Rssfeedauthor.author' => "$author", 'Rssfeedauthor.feed_id' => $feed_id)));

        if ($count > 0) {
            $this->Rssfeedauthor->updateAll(
                    array("Rssfeedauthor.author_used" => "Rssfeedauthor.author_used+1"), array("Rssfeedauthor.feed_id" => $feed_id, "Rssfeedauthor.author" => "$author")
            );
        } else {

            $data = array();
            $data["Rssfeedauthor"]["author_used"] = "1";
            $data["Rssfeedauthor"]["author"] = "$author";
            $data["Rssfeedauthor"]["feed_id"] = "$feed_id";
            $data["Rssfeedauthor"]["createtime"] = time();

            $this->Rssfeedauthor->create();
            $this->Rssfeedauthor->save($data);
        }
    }

    function add_feed_tags($tag, $feed_id) {
        $count = $this->Rssfeedtag->find('count', array('conditions' => array('Rssfeedtag.tag' => "$tag", 'Rssfeedtag.feed_id' => $feed_id)));

        if ($count > 0) {
            $this->Rssfeedtag->updateAll(
                    array("Rssfeedtag.tag_used" => "Rssfeedtag.tag_used+1"), array("Rssfeedtag.feed_id" => $feed_id, "Rssfeedtag.tag" => "$tag")
            );
        } else {

            $data = array();
            $data["Rssfeedtag"]["tag_used"] = "1";
            $data["Rssfeedtag"]["tag"] = "$tag";
            $data["Rssfeedtag"]["feed_id"] = "$feed_id";
            $data["Rssfeedtag"]["createtime"] = time();

            $this->Rssfeedtag->create();
            $this->Rssfeedtag->save($data);
        }
    }

    function get_feed_story_count($feed_id = null) {

        $count = $this->RssmoreFeedstory->find('count', array(
            'conditions' => array('RssmoreFeedstory.feed_id' => $feed_id)
        ));

        if ($count > 0) {
            exit;
        }
    }

    function download_rssmorefeed_data_single($fid = null, $flag = 'N') {
        Configure::write('debug', 0);
        date_default_timezone_set('UTC');
        ini_set('max_execution_time', -1);
        $this->autoLayout = false;
        $this->autoRender = false;
        $logdate = date('d-m-Y');
        $cron_id = 4;
        $days_bak_time = strtotime("-30 day");

        // $this->cron_start_status($cron_id,'rssfeed_type_eight_addlog_'.$logdate);

        if ($flag == 'N') {
            $this->get_feed_story_count($fid);
        }

        CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Cron Start' . "\n\t\r");



        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    )
                )
        );

        $conditions = array(
            'Feed.id' => $fid,
            'Feed.url !=' => '',
            'Feed.status' => '1'
        );

        if (!empty($this->userids)) {
            // $conditions['Feed.user_id'] = $this->userids;
        }




        $rssmore_data = $this->Feed->find('all', array(
            'fields' => array('Feed.id', 'Feed.user_id', 'Feed.title', 'Feed.url', 'Feed.status'),
            'conditions' => $conditions,
            'order' => array('Feed.id ASC')
                )
        );





        foreach ($rssmore_data as $rssmore) {


            $feed_id = $rssmore['Feed']['id'];
            $user_id = $rssmore['Feed']['user_id'];
            $feed_url = $rssmore['Feed']['url'];
            $ping_url_arr = parse_url($feed_url);
            $ping_url = $ping_url_arr['host'];


            CakeLog::write('Ping_' . $ping_url . '_' . $logdate, 'Ping[Feed_id-' . $feed_id . ']: ' . $feed_url . "");
            if ($this->get_http_response_code($feed_url) != '404') {

                CakeLog::write('Ping_' . $ping_url . '_' . $logdate, 'Ping[Feed_id-' . $feed_id . ']: ' . $feed_url . "");
                $curldata = $this->get_curl_data($feed_url);

                if (empty($curldata)) {
                    CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Data not found [Feed_id-' . $feed_id . ']: ' . $feed_url . "\n\t\r");
                    continue;
                } //


                $rssmoredata = $this->xml_to_array($curldata, true);

                if (empty($rssmoredata)) {

                    CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Data not found [Feed_id-' . $feed_id . ']: ' . $feed_url . "\n\t\r");
                    continue;
                }

                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Process Start[Feed_id-' . $feed_id . '] (' . $feed_url . ')' . "\n\t\r");
                $this->add_rssmore_data($user_id, $feed_id, $feed_url, $rssmoredata);
                usleep(500000); //1 second = 1000000 ms
                $this->add_track_rss_more_feed_id($feed_id);
                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Process End (' . $feed_url . ')' . "\n\t\r");
            } else {
                CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, '404 found[Feed_id-' . $feed_id . '] : (' . $feed_url . ')' . "\n\t\r");
            }
        }

        //$log = $this->Feed->getDataSource()->getLog(false, false);
        // debug($log);
        //  CakeLog::write('rssfeed_type_eight_addlog_' . $logdate, 'Cron End' . "\n\t\r");
        //$this->cron_update_status($cron_id);

        $query = "update `feeds` set `cron_update` ='" . time() . "' where id=$feed_id";
        $this->Feed->query($query);
    }

    function add_message_sent_data($message_id, $feed_id = null, $user_id = null, $single_or_news = '1', $subscription_id = null) {
        Configure::write('debug', 0);
        Controller::loadModel('MessageSentRecord');
        $MessageSentRecords = array();
        $MessageSentRecords['MessageSentRecord']['message_id'] = $message_id;
        $MessageSentRecords['MessageSentRecord']['feed_id'] = $feed_id;
        $MessageSentRecords['MessageSentRecord']['user_id'] = $user_id;
        $MessageSentRecords['MessageSentRecord']['subscription_id'] = $subscription_id;
        $MessageSentRecords['MessageSentRecord']['feed_type'] = 8;
        $MessageSentRecords['MessageSentRecord']['sent_time'] = time();
        $MessageSentRecords['MessageSentRecord']['single_or_news'] = $single_or_news;
        $MessageSentRecords['MessageSentRecord']['device_type'] = 'desktop';
        $MessageSentRecords['MessageSentRecord']['news_status'] = ($single_or_news == 1) ? 'Y' : 'N';

        $this->MessageSentRecord->create();
        $this->MessageSentRecord->save($MessageSentRecords);
    }

    function add_openrates_data($feed_id = null, $user_id = null, $message_type = "S", $feed_type = 8, $mktimevalue = '0') {
        Configure::write('debug', 0);
        $this->loadModel('OpenRate');
        $openrates = array();
        $openrates['OpenRate']['feed_id'] = $feed_id;
        $openrates['OpenRate']['feed_type'] = $feed_type;
        $openrates['OpenRate']['user_id'] = $user_id;
        $openrates['OpenRate']['message_type'] = $message_type;
        $openrates['OpenRate']['createtime'] = $mktimevalue;
        $openrates['OpenRate']['status'] = "N";
        $this->OpenRate->create();
        $this->OpenRate->save($openrates);
    }

    /*
      for iphone push messages
     */

    function rssmore_sending_mobile_notification() {

        date_default_timezone_set('UTC');
        $this->autoLayout = false;
        $this->autoRender = false;
        $SITE_URL = 'http://specificfeeds.com';
        $cron_id = 5;
        $days_bak_time = strtotime("-10 hour");
        $logdate = date('d-m-Y');
        //$this->cron_start_status($cron_id, 'rssmore_sending_mobile_notification_' . $logdate);
        CakeLog::write('rssmore_sending_mobile_notification_' . $logdate, 'Cron Start' . "\n\t\r");
        
        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    ),
                    'belongsTo' =>
                    array(
                        'User'
                    )
                )
        );


        $this->Feed->bindModel(
                array(
                    'hasMany' =>
                    array(
                        'RssmoreFeedData' =>
                        array(
                            'className' => 'RssmoreFeedData',
                            'conditions' => array('RssmoreFeedData.server_createtime >' => "$days_bak_time"),
                            'order' => array('RssmoreFeedData.id DESC'),
                            'foreignKey' => 'feed_id',
                            'limit' => 20
                        )
                    )
                )
        );


        $feed_data = $this->Feed->find('all', array(
            'conditions' => array('Feed.feed_type' => 8, 'Feed.status' => 1),
            'fields' => array('Feed.id', 'Feed.title'),
            'order' => array('Feed.id ASC')
                )
        );
        
       
        
        $joins = array();
        $joins[] = array(
            'table' => 'users',
            'alias' => 'User',
            'type' => 'LEFT',
            'conditions' => array(
                'User.id = Subscriber.user_id'
            )
        );

        $joins[] = array(
            'table' => 'newspapers',
            'alias' => 'Newspaper',
            'type' => 'LEFT',
            'conditions' => array(
                'Newspaper.user_id = Subscriber.user_id'
            )
        );
        
        $joins[] = array(
            'table' => 'timezones',
            'alias' => 'Timezone',
            'type' => 'LEFT',
            'conditions' => array(
                'Timezone.id = User.timezone'
            )
        );



        if (!empty($feed_data)) {  //check feed found  
            foreach ($feed_data as $feeddata) {

                $feed_id = $feeddata['Feed']['id'];
                $feed_title = $feeddata['Feed']['title'];
                $rssmoredata = $feeddata['RssmoreFeedData'];


                if (!empty($rssmoredata)) {   //if rss data found     
                    //print_r($feeddata); 
                    $conditions = array(
                        'Subscriber.feed_id' => $feed_id,
                        'Subscriber.byautomobile' => 1,
                        'User.status' => 1,
                    );
                    if (!empty($this->userids)) {
                        $conditions['Subscriber.user_id'] = $this->userids;
                    }



                    //$conditions['Subscriber.last_execution_time <  '] = time()-(60*60);   


                    $rss_more_users = $this->Subscriber->find('all', array(
                        'conditions' => $conditions,
                        'fields' => array(
                            'Subscriber.id',
                            'Subscriber.feed_id',
                            'Subscriber.rssfeed_name',
                            'Subscriber.rssfeed_keywords',
                            'Subscriber.rssfeed_is_all_keyword_match',
                            'Subscriber.rssfeed_keyword_searching_place',
                            'Subscriber.rssfeed_must_not_keywords',
                            'Subscriber.rssfeed_must_not_keyword_searching_place',
                            'Subscriber.rssfeed_is_must_not_contain_keyword_and',
                            'Subscriber.rssfeed_must_include_tags',
                            'Subscriber.rssfeed_is_must_include_all_tags',
                            'Subscriber.rssfeed_must_not_include_tags',
                            'Subscriber.rssfeed_is_must_not_contain_tag_and',
                            'Subscriber.rssfeed_authors',
                            'Subscriber.createtime',
                            'Subscriber.byautomobile',
                            'Subscriber.automobile',
                            'User.id',
                            'User.email',
                            'User.status',
                            'Newspaper.delivery_type',
                            'Newspaper.time',
                            'Newspaper.weekday',
                            'Newspaper.month_date',
                            'Newspaper.year_date',
                            'Newspaper.month',
                            'Newspaper.alertSelect',
                            'Newspaper.alert_time_from',
                            'Newspaper.alert_time_to',
                            'Timezone.value'
                        ),
                        'order' => array('User.id ASC'),
                        'joins' => $joins
                            )
                    );




                    if (!empty($rss_more_users)) {   //user data found  
                        foreach ($rss_more_users as $morefeed_user) {

                            $subscriber_data = array(
                                'subscriber_id' => $morefeed_user['Subscriber']['id'],
                                'feed_id' => $morefeed_user['Subscriber']['feed_id'],
                                'rssfeed_name' => stripslashes($morefeed_user['Subscriber']['rssfeed_name']),
                                'rssfeed_is_all_keyword_match' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_all_keyword_match']),
                                'rssfeed_keyword_searching_place' => stripslashes($morefeed_user['Subscriber']['rssfeed_keyword_searching_place']),
                                'rssfeed_keywords' => stripslashes($morefeed_user['Subscriber']['rssfeed_keywords']),
                                'rssfeed_must_not_keywords' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_keywords']),
                                'rssfeed_must_not_keyword_searching_place' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_keyword_searching_place']),
                                'rssfeed_is_must_not_contain_keyword_and' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_not_contain_keyword_and']),
                                'rssfeed_must_include_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_include_tags']),
                                'rssfeed_is_must_include_all_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_include_all_tags']),
                                'rssfeed_is_must_not_contain_tag_and' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_not_contain_tag_and']),
                                'rssfeed_must_not_include_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_include_tags']),
                                'rssfeed_authors' => stripslashes($morefeed_user['Subscriber']['rssfeed_authors']),
                                'createtime' => $morefeed_user['Subscriber']['createtime'],
                                'byautomobile' => $morefeed_user['Subscriber']['byautomobile'],
                                'automobile' => $morefeed_user['Subscriber']['automobile'],
                                'user_id' => $morefeed_user['User']['id'],
                                'feed_title' => $feed_title,
                                'email' => $morefeed_user['User']['email']
                            );

                            $time = !empty($morefeed_user['Newspaper']['time']) ? $morefeed_user['Newspaper']['time'] : 8;
                            $month_date = !empty($morefeed_user['Newspaper']['month_date']) ? $morefeed_user['Newspaper']['month_date'] : 1;
                            $weekday = !empty($morefeed_user['Newspaper']['weekday']) ? $morefeed_user['Newspaper']['weekday'] : 1;
                            $year_date = !empty($morefeed_user['Newspaper']['year_date']) ? $morefeed_user['Newspaper']['year_date'] : 1;
                            $month = !empty($morefeed_user['Newspaper']['month']) ? $morefeed_user['Newspaper']['month'] : 1;

                            $timezone = $morefeed_user['Timezone']['value'];
                            //$delivery_type = $morefeed_user['Newspaper']['delivery_type'];
                            $delivery_type = !empty($morefeed_user['Newspaper']['delivery_type']) ? $morefeed_user['Newspaper']['delivery_type'] : 1;


                            $send_push = true;
                            if (!empty($timezone)) {
                                $timezone = str_replace(":", '.', $timezone);
                                $timezone_arr = explode(".", $timezone);
                                $timezone_arr[1] = ($timezone_arr[1] * 100) / 60;
                                $timezone = $timezone_arr[0] . "." . $timezone_arr[1];
                                $timeAfterTimeZone = time() + ($timezone) * 60 * 60;
                            } else {
                                $timeAfterTimeZone = time();
                            }

                            $current_hour = date('G', $timeAfterTimeZone);
                            $current_hour_2 = date('G.i', $timeAfterTimeZone);
                            $current_week = date('N', $timeAfterTimeZone);
                            $current_day = date('j', $timeAfterTimeZone);
                            $current_month = date('n', $timeAfterTimeZone);

                            $alertSelect = $morefeed_user['Newspaper']['alertSelect'];

                            if ($alertSelect == 1) {

                                $alert_time_from = $morefeed_user['Newspaper']['alert_time_from'];
                                $alert_time_to = $morefeed_user['Newspaper']['alert_time_to'];
                                $alert_time_to_2 = $alert_time_to . '.00';

                                if ($current_hour >= $alert_time_from and $current_hour <= $alert_time_to and $current_hour_2 <= $alert_time_to_2) {
                                    $send_push = false;
                                }
                            }
                            
                            CakeLog::write('rssmore_sending_mobile_notification_' . $logdate, 'User Process Data (' . $morefeed_user['User']['email'] . ')  : Subscription_id-' . $morefeed_user['Subscriber']['id'] . "\n\t\r");   //log
                            if (!empty($rssmoredata))
                                $this->set_mobile_notification($subscriber_data, $rssmoredata, $send_push);
                            else
                                CakeLog::write('rssmore_sending_mobile_notification_' . $logdate, 'Data Empty (' . $morefeed_user['User']['email'] . ')  : Subscription_id-' . $morefeed_user['Subscriber']['id'] . "\n\t\r");   //log
                        }
                    } //end if of user data  found    
                } //end if rss data found     
            } //end main for each 
        } //end if block to check feed found     
        // $this->cron_update_status($cron_id);
        CakeLog::write('rssmore_sending_mobile_notification_' . $logdate, 'Cron End' . "\n\t\r");
        //$log = $this->Subscriber->getDataSource()->getLog(false, false);
        // debug($log); 
        //exit; 
        $this->senddonotdisturbmessage(); 
    }

    function set_mobile_notification($subscriber_data = null, $RssmoreFeedDatas = null, $send_push = false) {


        $logdate = date('d-m-Y');
        $rssfeed_is_all_keyword_match = $subscriber_data['rssfeed_is_all_keyword_match'];
        $rssfeed_keyword_searching_place = $subscriber_data['rssfeed_keyword_searching_place'];
        $rssfeed_is_must_not_contain_keyword_and = $subscriber_data['rssfeed_is_must_not_contain_keyword_and'];
        $rssfeed_must_not_keyword_searching_place = $subscriber_data['rssfeed_must_not_keyword_searching_place'];
        $rssfeed_is_must_include_all_tags = $subscriber_data['rssfeed_is_must_include_all_tags'];
        $rssfeed_is_must_not_contain_tag_and = $subscriber_data['rssfeed_is_must_not_contain_tag_and'];

        $rssfeed_keywords = $subscriber_data['rssfeed_keywords'];
        $rssfeed_must_not_keywords = $subscriber_data['rssfeed_must_not_keywords'];
        $rssfeed_must_include_tags = $subscriber_data['rssfeed_must_include_tags'];
        $rssfeed_must_not_include_tags = $subscriber_data['rssfeed_must_not_include_tags'];
        $rssfeed_authors = $subscriber_data['rssfeed_authors'];
        $rssfeed_byautomobile = $subscriber_data['byautomobile'];
        $rssfeed_automobile = $subscriber_data['automobile'];

        $rssfeedsub_createtime = (int) $subscriber_data['createtime'];

        $subscriber_id = $subscriber_data['subscriber_id'];

        $subscription_id = $subscriber_data['subscriber_id'];
        $feed_id = $subscriber_data['feed_id'];
        $user_id = $subscriber_data['user_id'];
		$feed_title = $subscriber_data['feed_title'];

        //$this->update_last_execution_time($subscriber_id);

        $this->loadModel('Mobilemessage');

        $keywordarr = array();
        $keyword_not_arr = array();
        $rssfeed_must_include_tags_arr = array();
        $rssfeed_must_not_include_tags = array();

        if (!empty($rssfeed_keywords))
            $keywordarr = explode(",", $rssfeed_keywords);

        if (!empty($rssfeed_must_not_keywords))
            $keyword_not_arr = explode(",", $rssfeed_must_not_keywords);

        if (!empty($rssfeed_must_include_tags))
            $rssfeed_must_include_tags_arr = explode(",", $rssfeed_must_include_tags);

        if (!empty($rssfeed_must_not_include_tags))
            $rssfeed_must_not_include_tags_arr = explode(",", $rssfeed_must_not_include_tags);

        if (!empty($rssfeed_authors))
            $rssfeed_authors_arr = explode(",", $rssfeed_authors);



        if (!empty($RssmoreFeedDatas)) {

            foreach ($RssmoreFeedDatas as $key => $RssmoreFeedData) {

                //$RssmoreFeedData = $RssmoreFeedData['RssmoreFeedData'];
                $rssmore_id = $RssmoreFeedData['id'];
                $rssmore_server_createtime = $RssmoreFeedData['createtime'];


                if ($rssmore_server_createtime < $rssfeedsub_createtime) {
                    //unset($RssmoreFeedDatas[$key]);
                    //continue;
                }

                $checkid = $this->Mobilemessage->find('count', array('conditions' => array('Mobilemessage.message_id' => $rssmore_id, 'Mobilemessage.feed_id' => $feed_id, 'Mobilemessage.user_id' => $user_id)));
                
                $statuscheckid = $this->Mobilemessage->find('count', array('conditions' => array('Mobilemessage.message_id' => $rssmore_id, 'Mobilemessage.feed_id' => $feed_id, 'Mobilemessage.user_id' => $user_id,'Mobilemessage.send_status'=>'N')));
                if ($checkid > 0 ) {
                    unset($RssmoreFeedDatas[$key]);
                    continue;
                }

                $rssfeedtitle = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags($RssmoreFeedData['title']))));
                $rssfeeddesc = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags((string) $RssmoreFeedData['description']))));
                $RssmoreFeedData['category'] = $this->arraycase(explode(",", $RssmoreFeedData['category']), 'lower');
                //Start Conditions check    





                $include_tag_found = '';
                if (!empty($rssfeed_must_include_tags_arr)) {  //start conditions must include tags
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $include_tag_found = 'notfound';

                    if ($rssfeed_is_must_include_all_tags == '2') {
                        foreach ($rssfeed_must_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) and is_array($RssmoreFeedData['category']) and ! empty($keyword)) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $continue_keyword = false;
                                    if ($include_tag_found == 'notfound')
                                        $include_tag_found = 'found';
                                }
                            }
                        }
                    }else {
                        foreach ($rssfeed_must_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) && is_array($RssmoreFeedData['category'])) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $keyword_found++;
                                    $continue_keyword = false;
                                    $include_tag_found = 'found';
                                }
                            }
                        }

                        if (($keyword_found) != count($rssfeed_must_include_tags_arr)) {
                            $continue_keyword = true;
                        }
                    }


                    if ($continue_keyword == true) {
                        //unset($RssmoreFeedDatas[$key]);
                        // continue;
                    }
                } //end conditions must include tags

                $not_include_tag_found = '';
                if (!empty($rssfeed_must_not_include_tags_arr)) {  //start conditions 
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $not_include_tag_found = 'notfound';

                    // if($rssfeed_is_must_not_contain_tag_and=='1'){
                    if (true) {
                        foreach ($rssfeed_must_not_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) and is_array($RssmoreFeedData['category']) and ! empty($keyword)) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $continue_keyword = false;
                                    $not_include_tag_found = 'found';
                                }
                            }
                        }
                    } else {

                        foreach ($rssfeed_must_not_include_tags_arr as $keyword) {
                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                            if (!empty($RssmoreFeedData['category']) && is_array($RssmoreFeedData['category'])) {
                                if (in_array($keyword, $RssmoreFeedData['category'])) {
                                    $keyword_found++;
                                    $continue_keyword = false;
                                    $not_include_tag_found = 'found';
                                }
                            }
                        }
                        if (($keyword_found) != count($rssfeed_must_not_include_tags_arr)) {
                            $continue_keyword = true;
                            $not_include_tag_found = 'notfound';
                        } else {
                            $continue_keyword = false;
                            $not_include_tag_found = 'found';
                        }
                    }


                    if ($continue_keyword == false) {
                        //unset($RssmoreFeedDatas[$key]);
                        //continue;
                    }
                } //end conditions 


                $continue_keyword = true;
                $keyword_found = 0;
                $keyword_data_found = '';
                if (!empty($keywordarr)) {
                    $keyword_data_found = 'notfound';
                    if ($rssfeed_is_all_keyword_match == 'N') {

                        foreach ($keywordarr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            $feed_inner_info = array();

                            if ($rssfeed_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false || customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_data_found = 'found';
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_data_found = 'found';
                                }
                            }
                        }
                    } else {


                        foreach ($keywordarr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            if ($rssfeed_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                } else if (customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            }
                        }

                        if (($keyword_found) != count($keywordarr)) {
                            $continue_keyword = true;
                            $keyword_data_found = 'notfound';
                        } else {
                            $keyword_data_found = 'found';
                        }
                    }


                    if ($continue_keyword == true) {

                        // unset($RssmoreFeedDatas[$key]);
                        // continue;
                    }
                }

                $not_keyword_data_found = '';
                if (!empty($keyword_not_arr)) {   //start conditions keyword must not
                    $continue_keyword = true;
                    $keyword_found = 0;
                    $not_keyword_data_found = 'notfound';
                    // if($rssfeed_is_must_not_contain_keyword_and=='1'){
                    if (true) {

                        foreach ($keyword_not_arr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            $feed_inner_info = array();

                            if ($rssfeed_must_not_keyword_searching_place == '2') {

                                if (customStrPosWord($rssfeedtitle, $keyword) !== false || customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $not_keyword_data_found = 'found';
                                }
                            } else {

                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $not_keyword_data_found = 'found';
                                }
                            }
                        }
                    } else {


                        foreach ($keyword_not_arr as $keyword) {

                            $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));
                            if ($rssfeed_must_not_keyword_searching_place == '2') {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                } else if (customStrPosWord($rssfeeddesc, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            } else {
                                if (customStrPosWord($rssfeedtitle, $keyword) !== false) {
                                    $continue_keyword = false;
                                    $keyword_found++;
                                }
                            }
                        }

                        if (($keyword_found) != count($keyword_not_arr)) {
                            $continue_keyword = true;
                        } else {
                            $continue_keyword = false;
                        }
                    }


                    if ($continue_keyword == false) {
                        // unset($RssmoreFeedDatas[$key]);
                        //  continue;
                    }
                }    //end conditions keyword must not

                $author_found = '';

                if (!empty($rssfeed_authors_arr)) {
                    $continue_keyword = true;
                    $author_found = 'notfound';
                    foreach ($rssfeed_authors_arr as $keyword) {
                        $keyword = strtolower(trim(str_replace(array('“', "`"), array('""', "'"), $keyword)));

                        if (!empty($RssmoreFeedData['author'])) {
                            $RssmoreFeedData['author'] = $this->arraycase(explode(",", $RssmoreFeedData['author']), 'lower');
                            if (!empty($RssmoreFeedData['author']) && is_array($RssmoreFeedData['author'])) {

                                if (in_array($keyword, $RssmoreFeedData['author'])) {
                                    $continue_keyword = false;
                                    $author_found = 'found';
                                }
                            }
                        }
                    }

                    if ($continue_keyword == true) {
                        //unset($RssmoreFeedDatas[$key]);
                        //continue;
                    }
                }




                $fisrt_and_or = $rssfeed_is_must_not_contain_tag_and;
                $secnd_and_or = $rssfeed_is_must_not_contain_keyword_and;
                // echo "<br />";


                if ($fisrt_and_or == 1 and $secnd_and_or == 1) {

                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } elseif ($include_tag_found == 'notfound' or $keyword_data_found == 'notfound' or $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 2 and $secnd_and_or == 1) {




                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found' and $keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'found' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'found' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 1 and $secnd_and_or == 2) {

                    if ($include_tag_found == 'found' and $not_include_tag_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' or $keyword_data_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'found' and $keyword_data_found == 'found' and $not_keyword_data_found == 'found') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                } else if ($fisrt_and_or == 2 and $secnd_and_or == 2) {

                    if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == '') {  //extra condition for all
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == '' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == '' and $author_found == 'notfound') {    //added for or
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == 'notfound' and $keyword_data_found == 'notfound' and $author_found == '') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    } else if ($include_tag_found == '' and $keyword_data_found == 'notfound' and $author_found == 'notfound') {
                        unset($RssmoreFeedDatas[$key]);
                        continue;
                    }
                }


                //End Conditions check
                $idsarray[] = $RssmoreFeedData['id'];
                $idsarrayNew[] = array('mess_id' => $RssmoreFeedData['id'], 'title' => $RssmoreFeedData['title'], 'createtime' => $RssmoreFeedData['createtime'], 'link' => $RssmoreFeedData['link'], 'feed_title'=>$feed_title);
            }







            $title = $subscriber_data['feed_title'];


            $unsubscribe_link = $this->mysiteurl . "feeds/unsubscribefeed/$feed_id/$user_id/$subscription_id";

            $key = base64_encode("userid=$user_id&feed_id=$feed_id&subscription_id=$subscription_id");
            $mysubs = $this->mysiteurl . "pages/editmyfeed/$key";


            $maildata['feed_id'] = $feed_id;
            $maildata['user_id'] = $user_id;

            $maildata['heading'] = $title;
            $maildata['name'] = $title;
            $maildata['manage_subs'] = $this->mysiteurl . "users/mysubscription";
            $maildata['edit_subs'] = $mysubs;
            $maildata['unsubscribe_link'] = $unsubscribe_link;

            $mktimevalue = time();
            $maildata['mktimevalue'] = $mktimevalue;

            $email = $subscriber_data['email'];
            $email22 = 'richard@123789.org';
            $subject = stripslashes('New: message from feed "' . $title . '"');

            if (!empty($RssmoreFeedDatas)) {
                $this->loadModel('Tocken');
                $tokedata = $this->Tocken->find('all', array('fields' => array('Tocken.tockenid'), 'conditions' => array('Tocken.user_id' => $user_id)));
                if ($send_push == true and ! empty($tokedata) and $rssfeed_automobile == '0') {
                    //$this->donotdisturbmessage($tokedata,$feed_id,$user_id); 
                }
                foreach ($idsarrayNew as $message) {

                    $data_arr[] = array();
                    $mess_id = $message['mess_id'];
                    $data_arr['RssmoreFeedTrack']['subscription_id'] = $subscription_id;
                    $data_arr['RssmoreFeedTrack']['rssmore_id'] = $message['mess_id'];
                    //$message_title = stripslashes(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags($message['title']))));
                    $message_title  =  stripslashes(trim(str_replace(array('“',"`",'–'),array('"',"'",'-'),strip_tags(utf8_decode($message['title'])))));
                    $data_arr['RssmoreFeedTrack']['createtime'] = time();

                    $createtime = $message['createtime'];
                    //$this->RssmoreFeedTrack->create();
                    //$this->RssmoreFeedTrack->save($data_arr);
                    $moblielink = $message['link'];
					
					$mobile_new_data = array(
					
						'feed_title'=>$message['feed_title'],
						'message_title'=>$message_title,
						'link'=>$moblielink
						
					);
                   
                    if ($send_push == true and ! empty($tokedata) and $rssfeed_automobile == '0') {

                        $this->mobliemessage($mess_id, $user_id, $feed_id, '8', $rssfeed_automobile, $createtime,'Y',$mobile_new_data);
                        foreach ($tokedata as $tokend) {
                            $pushcount = $this->returnPuchCount($user_id);
                            
                            $this->pushnotify($tokend['Tocken']['tockenid'], $message_title, $pushcount, $moblielink, $feed_id);
                        }
                       
                    }else{
                       $this->mobliemessage($mess_id, $user_id, $feed_id, '8', $rssfeed_automobile, $createtime,'N',$mobile_new_data); 
                    }
                    $this->add_message_sent_data($mess_id, $feed_id, $user_id, '3', $subscription_id);
                }
                $this->add_openrates_data($feed_id, $user_id, 'M', '8', $mktimevalue);

                CakeLog::write('rssmore_sending_mobile_notification_' . $logdate, 'User Mail Sent (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
            } else {
                CakeLog::write('rssmore_sending_mobile_notification_' . $logdate, 'Data Empty (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
            }
        } else {
            CakeLog::write('rssmore_sending_mobile_notification_' . $logdate, 'Data Empty (' . $email . ')  : Subscription_id-' . $subscription_id . "\n\t\r");   //log
        }
    }
    
    function senddonotdisturbmessage(){
        
        date_default_timezone_set('UTC');
        $this->autoLayout = false;
        $this->autoRender = false;
        $SITE_URL = 'http://specificfeeds.com';
        //$this->cron_start_status($cron_id, 'rssmore_sending_mobile_notification_' . $logdate);
        //$userids = array('3465');
        
        $this->Feed->unbindModel(
                array(
                    'hasMany' =>
                    array(
                        'Subscriber'
                    ),
                    'belongsTo' =>
                    array(
                        'User'
                    )
                )
        );

        $feed_data = $this->Feed->find('all', array(
            'conditions' => array('Feed.feed_type' => 8, 'Feed.status' => 1),
            'fields' => array('Feed.id', 'Feed.title'),
            'order' => array('Feed.id ASC')
                )
        );
        
       
        
        $joins = array();
        $joins[] = array(
            'table' => 'users',
            'alias' => 'User',
            'type' => 'LEFT',
            'conditions' => array(
                'User.id = Subscriber.user_id'
            )
        );

        $joins[] = array(
            'table' => 'newspapers',
            'alias' => 'Newspaper',
            'type' => 'LEFT',
            'conditions' => array(
                'Newspaper.user_id = Subscriber.user_id'
            )
        );
        
        $joins[] = array(
            'table' => 'timezones',
            'alias' => 'Timezone',
            'type' => 'LEFT',
            'conditions' => array(
                'Timezone.id = User.timezone'
            )
        );



        if (!empty($feed_data)) {  //check feed found  
            foreach ($feed_data as $feeddata) {

                $feed_id = $feeddata['Feed']['id'];
                $feed_title = $feeddata['Feed']['title'];
              


                    //if rss data found     
                    //print_r($feeddata); 
                    $conditions = array(
                        'Subscriber.feed_id' => $feed_id,
                        'Subscriber.byautomobile' => 1,
                        'User.status' => 1,
                    );
                   // $conditions['Subscriber.user_id']='3465';
                    if (!empty($this->userids)) {
                        $conditions['Subscriber.user_id'] = $this->userids;
                    }

                    $this->loadModel('Tocken');
                   
                    //$conditions['Subscriber.last_execution_time <  '] = time()-(60*60);   
                    $rss_more_users = $this->Subscriber->find('all', array(
                        'conditions' => $conditions,
                        'fields' => array(
                            'Subscriber.id',
                            'Subscriber.feed_id',
                            'Subscriber.rssfeed_name',
                            'Subscriber.rssfeed_keywords',
                            'Subscriber.rssfeed_is_all_keyword_match',
                            'Subscriber.rssfeed_keyword_searching_place',
                            'Subscriber.rssfeed_must_not_keywords',
                            'Subscriber.rssfeed_must_not_keyword_searching_place',
                            'Subscriber.rssfeed_is_must_not_contain_keyword_and',
                            'Subscriber.rssfeed_must_include_tags',
                            'Subscriber.rssfeed_is_must_include_all_tags',
                            'Subscriber.rssfeed_must_not_include_tags',
                            'Subscriber.rssfeed_is_must_not_contain_tag_and',
                            'Subscriber.rssfeed_authors',
                            'Subscriber.createtime',
                            'Subscriber.byautomobile',
                            'Subscriber.automobile',
                            'User.id',
                            'User.email',
                            'User.status',
                            'Newspaper.delivery_type',
                            'Newspaper.time',
                            'Newspaper.weekday',
                            'Newspaper.month_date',
                            'Newspaper.year_date',
                            'Newspaper.month',
                            'Newspaper.alertSelect',
                            'Newspaper.alert_time_from',
                            'Newspaper.alert_time_to',
                            'Timezone.value'
                        ),
                        'order' => array('User.id ASC'),
                        'joins' => $joins
                            )
                    );


                    if (!empty($rss_more_users)) {   //user data found  
                        foreach ($rss_more_users as $morefeed_user) {

                            $subscriber_data = array(
                                'subscriber_id' => $morefeed_user['Subscriber']['id'],
                                'feed_id' => $morefeed_user['Subscriber']['feed_id'],
                                'rssfeed_name' => stripslashes($morefeed_user['Subscriber']['rssfeed_name']),
                                'rssfeed_is_all_keyword_match' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_all_keyword_match']),
                                'rssfeed_keyword_searching_place' => stripslashes($morefeed_user['Subscriber']['rssfeed_keyword_searching_place']),
                                'rssfeed_keywords' => stripslashes($morefeed_user['Subscriber']['rssfeed_keywords']),
                                'rssfeed_must_not_keywords' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_keywords']),
                                'rssfeed_must_not_keyword_searching_place' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_keyword_searching_place']),
                                'rssfeed_is_must_not_contain_keyword_and' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_not_contain_keyword_and']),
                                'rssfeed_must_include_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_include_tags']),
                                'rssfeed_is_must_include_all_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_include_all_tags']),
                                'rssfeed_is_must_not_contain_tag_and' => stripslashes($morefeed_user['Subscriber']['rssfeed_is_must_not_contain_tag_and']),
                                'rssfeed_must_not_include_tags' => stripslashes($morefeed_user['Subscriber']['rssfeed_must_not_include_tags']),
                                'rssfeed_authors' => stripslashes($morefeed_user['Subscriber']['rssfeed_authors']),
                                'createtime' => $morefeed_user['Subscriber']['createtime'],
                                'byautomobile' => $morefeed_user['Subscriber']['byautomobile'],
                                'automobile' => $morefeed_user['Subscriber']['automobile'],
                                'user_id' => $morefeed_user['User']['id'],
                                'feed_title' => $feed_title,
                                'email' => $morefeed_user['User']['email']
                            );
                            $feed_id = $subscriber_data['feed_id'];
                            $user_id = $subscriber_data['user_id'];
                            $tokedata = $this->Tocken->find('all', array('fields' => array('Tocken.tockenid'), 'conditions' => array('Tocken.user_id' => $user_id)));
                            $time = !empty($morefeed_user['Newspaper']['time']) ? $morefeed_user['Newspaper']['time'] : 8;
                            $month_date = !empty($morefeed_user['Newspaper']['month_date']) ? $morefeed_user['Newspaper']['month_date'] : 1;
                            $weekday = !empty($morefeed_user['Newspaper']['weekday']) ? $morefeed_user['Newspaper']['weekday'] : 1;
                            $year_date = !empty($morefeed_user['Newspaper']['year_date']) ? $morefeed_user['Newspaper']['year_date'] : 1;
                            $month = !empty($morefeed_user['Newspaper']['month']) ? $morefeed_user['Newspaper']['month'] : 1;

                            $timezone = $morefeed_user['Timezone']['value'];
                            //$delivery_type = $morefeed_user['Newspaper']['delivery_type'];
                            $delivery_type = !empty($morefeed_user['Newspaper']['delivery_type']) ? $morefeed_user['Newspaper']['delivery_type'] : 1;


                            $send_push = true;
                            if (!empty($timezone)) {
                                $timezone = str_replace(":", '.', $timezone);
                                $timezone_arr = explode(".", $timezone);
                                $timezone_arr[1] = ($timezone_arr[1] * 100) / 60;
                                $timezone = $timezone_arr[0] . "." . $timezone_arr[1];
                                $timeAfterTimeZone = time() + ($timezone) * 60 * 60;
                            } else {
                                $timeAfterTimeZone = time();
                            }

                            $current_hour = date('G', $timeAfterTimeZone);
                            $current_hour_2 = date('G.i', $timeAfterTimeZone);
                            $current_week = date('N', $timeAfterTimeZone);
                            $current_day = date('j', $timeAfterTimeZone);
                            $current_month = date('n', $timeAfterTimeZone);

                            $alertSelect = $morefeed_user['Newspaper']['alertSelect'];

                            if ($alertSelect == 1) {

                                $alert_time_from = $morefeed_user['Newspaper']['alert_time_from'];
                                $alert_time_to = $morefeed_user['Newspaper']['alert_time_to'];
                                $alert_time_to_2 = $alert_time_to . '.00';
                                
                                if ($current_hour >= $alert_time_from and $current_hour <= $alert_time_to and $current_hour_2 <= $alert_time_to_2) {
                                    $send_push = false;
                                }
                            }
                            $rssfeed_automobile = $subscriber_data['automobile'];
                             
                            if ($send_push == true and ! empty($tokedata) and $rssfeed_automobile == '0') {
                               $this->donotdisturbmessage($tokedata,$feed_id,$user_id); 
                            }
                            
                        }
                    } //end if of user data  found    
                 
            } //end main for each 
        } //end if block to check feed found     
       
    }

    function donotdisturbmessage($tokedata,$feed_id,$user_id){
       $this->loadModel('Mobilemessage');
       $mobilemessage=$this->Mobilemessage->find('all',array('conditions'=>array('Mobilemessage.feed_id'=>$feed_id,'Mobilemessage.user_id'=>$user_id,'Mobilemessage.send_status'=>'N')));
       $pushcount = $this->returnPuchCount($user_id);
       if(!empty($tokedata)){
       foreach($tokedata as $tokend) 
            foreach ($mobilemessage as $message){
               $mess_id = $message['Mobilemessage']['message_id'];
               if($mess_id!=0){
                    $rssmessages = $this->getmessage($mess_id);
                    if(!empty($rssmessages)){
                        //$message_title = stripslashes(trim(str_replace(array('“', "`"), array('""', "'"), strip_tags($rssmessages['title']))));
                        $message_title  =  stripslashes(trim(str_replace(array('“',"`",'–'),array('"',"'",'-'),strip_tags(utf8_decode($rssmessages['title'])))));
                        $createtime = $rssmessages['createtime'];
                        $moblielink = $rssmessages['link'];
                        $this->pushnotify($tokend['Tocken']['tockenid'], $message_title, $pushcount, $moblielink, $feed_id);
                    }    
                 $this->Mobilemessage->updateAll(array('Mobilemessage.send_status'=>'"Y"'), array('Mobilemessage.feed_id' => $feed_id,'Mobilemessage.user_id'=>$user_id,'Mobilemessage.message_id'=>$mess_id));   
               }    
            } 
       }
    }
   
    function getmessage($message_id) {  
        $this->LoadModel('RssmoreFeedstory');
        $return = array();
        $rssdata = $this->RssmoreFeedstory->find('first', array('fields'=>array('RssmoreFeedstory.pubdate_timestamp','RssmoreFeedstory.createtime','RssmoreFeedstory.pubdate','RssmoreFeedstory.title','RssmoreFeedstory.link','RssmoreFeedstory.rss_more_id'),'conditions' => array('RssmoreFeedstory.rss_more_id' => $message_id)));
        $return['title'] = $rssdata['RssmoreFeedstory']['title'];
        $return['link'] = $rssdata['RssmoreFeedstory']['link'];
        $return['pubdate_timestamp'] = $rssdata['RssmoreFeedstory']['pubdate_timestamp'];
        $return['createtime'] = $rssdata['RssmoreFeedstory']['createtime'];
        $return['pubdate'] = $rssdata['RssmoreFeedstory']['pubdate'];
        $return['time'] = date('h a', $rssdata['RssmoreFeedstory']['createtime']);
        return $return;
    }
    
    function mobliemessage($messageid, $user_id, $feed_id, $feed_type = 8, $message_type = null, $createtime,$send_status,$mobile_new_data=array()) {
       
        $this->loadModel('Mobilemessage');
        $this->loadModel('Newspaper');
        $mobilepush = array();
			if(!empty($mobile_new_data)){
			$mobilepush['Mobilemessage'] = $mobile_new_data;
			}
        $messagedata = $this->Mobilemessage->find('count', array('conditions' => array('Mobilemessage.message_id' => $messageid, 'Mobilemessage.feed_id' => $feed_id, 'Mobilemessage.user_id' => $user_id)));
        if($messagedata==0){
		    
            $mobilepush['Mobilemessage']['message_id'] = $messageid;
            $mobilepush['Mobilemessage']['feed_id'] = $feed_id;
            $mobilepush['Mobilemessage']['user_id'] = $user_id;
            $mobilepush['Mobilemessage']['createtime'] = $createtime;

            if ($message_type == 0)
                $message_type = 1;
            else
                $message_type = 2;

            $mobilepush['Mobilemessage']['message_type'] = $message_type;
            $mobilepush['Mobilemessage']['feed_type'] = $feed_type;
            $mobilepush['Mobilemessage']['status'] = '2';
            $mobilepush['Mobilemessage']['send_status'] = $send_status;
            $mobilepush['Mobilemessage']['created'] = date("Y-m-d H:i:s");
			

            $this->Mobilemessage->create();
            $this->Mobilemessage->save($mobilepush);
      }     
    
    }

    function pushnotify($tockenId = null, $title = null, $badgeNumber, $link, $feed_id) {
        
        Configure::write('debug', 0);
        $this->autoLayout = false;
        $this->autoRender = false;
        // Put your device token here (without spaces):
        // Put your device token here (without spaces):
        $deviceToken = $tockenId; //'05fa0c4e4c90aabce1a52b8eee63b975eea9ced6dce3c3c6ed39283abf02a3eb';
        // Put your private key's passphrase here:
        $passphrase = '12345';
       
        // Put your alert message here:
        $message = $title;
        //$badgeNumber = '10';
        ////////////////////////////////////////////////////////////////////////////////

        $ctx = stream_context_create();
        stream_context_set_option($ctx, 'ssl', 'local_cert', '/var/www/vhosts/specificfeeds.com/app/webroot/ck.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

        // Open a connection to the APNS server
        $fp = stream_socket_client(
                'ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);

        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);

        echo 'Connected to APNS' . PHP_EOL;

        // Create the payload body
        $body['aps'] = array(
            'alert' => $message,
            'sound' => 'default',
            'badgecount' => $badgeNumber,
            'link' => $link,
            'feed_id' => $feed_id
        );
        
        //$mess=preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($body));
        // Encode the payload as JSON
         $payload = json_encode($body);

        // Build the binary notification
        $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

        // Send it to the server
        $result = fwrite($fp, $msg, strlen($msg));

        /* if (!$result)
          echo 'Message not delivered' . PHP_EOL;
          else
          echo 'Message successfully delivered' . PHP_EOL;
         */

        // Close the connection to the server
        fclose($fp);
    }

    function returnPuchCount($user_id = null) {
        $this->loadModel('Mobilemessage');
        $Date = date('Y-m-d H:i:s', strtotime("-3 days"));
        $pushnews = $this->Mobilemessage->find('count', array('conditions' => array('Mobilemessage.status' => '2', 'Mobilemessage.created >' => $Date, 'Mobilemessage.user_id' => $user_id, 'Mobilemessage.message_type' => '1')));

        return $pushnews;
    }

}

?>