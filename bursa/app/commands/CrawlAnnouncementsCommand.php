<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\URL;

class CrawlAnnouncementsCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'crawl:announcements';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Cron job to crawl html data from Annc table and rewrite them in crawled table.';

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
	public function fire()
	{
		$this->info('Crawling data from Announcements Modal...');
		$announcelists = Announcement::where( 'crawled', '=', 0 )->get();
		
		foreach ($announcelists as $announce)
		{
			print_r($announce['category']);
			print_r($announce['id']);

			$html = '';
			$announce['html'] = preg_replace(array('`(<b)([^\w])`i', '`(<i)([^\w])`i'), array("<strong$2", "<em$2"), str_replace(array('</b>', '</i>'), array('</strong>', '</em>'), $announce['html']));
			//print $announce['id'] . '-----' . $announce['category'] . '----' . "\n";

		
			switch (preg_replace ( "/\r|\n/", "", $announce['category'])){
				
				
				// added by timenz
				case 'General Meeting' :
					$announce['category'] = 'General Meetings';
					$html = $this->categoryGeneralMeetings($announce);
					break;

				case 'Additional Listing Announcement (ALA)' :
					$announce['category'] = 'Additional Listing Announcement';
					$html = $this->categoryAla($announce['html']);
					break;

				case 'Entitlements (Notice of Book Closure)' :
					$announce['category'] = 'Entitlement(Notice of Book Closure)';
					$html = $this->categoryEntitlements($announce['html']);
					break;


				case 'Listing Circular' :
					$html = $this->categoryListingCircular($announce['html']);
					break;

				case 'General Announcement for PLC' :
					
					$html = $this->categoryGeneralAnnouncement($announce);
					break;

				case 'Document Submission' :
					$html = $this->categoryDocumentSubmission($announce['html']);
					break;

				case "Changes in Substantial Shareholder's Interest Pursuant to Form 29B of the Companies Act. 1965" :
					$html = $this->categoryChangesSubstantialShareHolder($announce);
					break;

				case "Changes in Director's Interest Pursuant to Section 135 of the Companies Act. 1965" :
					
					$html = $this->categoryChangesDirectorsInterest($announce);
					
					break;

				// end of added by timenz

				case 'Entitlements' :
					$html = $this->categoryEntitlements($announce['html']);
					break;
					//added by gjs
 				case 'Entitlement(Notice of Book Closure)':
					$html = $this->categoryEntitlements($announce['html']);
    					break;
						//end of addded new
				case 'Investor Alert' :
					$html = $this->categoryInvestorAlert($announce['html']);
					break;

				case 'Additional Listing Announcement' : 
					$html = $this->categoryAla($announce['html']);
					break;

				case 'Listing Circulars' :
					$html = $this->categoryListingCircular($announce['html']);
					break;
					
				//5 Trading of rights announcement

				case 'Financial Results' :
					$html = $this->categoryFinancialResults($announce);
					break;


				case 'General Announcement' :
					$html = $this->categoryGeneralAnnouncement($announce);
					break;


				case 'General Meetings' :
					$html = $this->categoryGeneralMeetings($announce);
					break;
					
				case 'Special Announcements' :
					$html = $this->categorySpecialAnnouncements($announce);
					break;
					
				case "Changes in Director's Interest(S135)" :
					$html = $this->categoryChangesDirectorsInterest($announce);
					break;
				case "Changes in Substantial Shareholder's Interest(29B)" :
					$html = $this->categoryChangesSubstantialShareHolder($announce);
					break;
				case "Notice of Interest of Substantial Shareholder Pursuant to Form 29A of the Companies Act. 1965" :
					$html = $this->categoryNoticeInterestShareholder($announce);
					break;
				case "Notice of Person Ceasing (29C)" :
					$html = $this->categoryPersonCeasing($announce);
					break;
				case "Change in Audit Committee" :
					$html = $this->categoryChnageAuditCommittee($announce);
					break;
				case "Change in Nomination Committee" :
					$html = $this->categoryChnageNominationCommittee($announce);
					break;
				case "Change in Boardroom" :
					$html = $this->categoryChnageBoardroom($announce);
					break;
				case "Change in Chief Executive Officer" :
					$html = $this->categoryExecutiveOfficer($announce);
					break;
				case "Change in Principal Officer" :
					$html = $this->categoryChnagePrincipalOfficer($announce);
					break;
				case "Change of Address" :
					$html = $this->categoryChangeAddress($announce);
					break;
				case "Change of Company Secretary" :
					$html = $this->categoryCompanySecretary($announce);
					break;
				case "Change in Risk Committee" :
					$html = $this->categoryChnageNominationCommittee($announce);
					break;
				case "Change of Registrar" :
					$html = $this->categoryChangeRegistrarDetail($announce);
					break;
				case "Notice of Resale/Cancellation of Treasury Shares - Immediate Announcement" :
					$html = $this->categoryResaleCancellation($announce);
					break;
				case "Notice of Shares Buy Back by a Company pursuant to Form 28A" :
					$html = $this->categoryNoticeShareBuyBack($announce);
					break;
				case "Notice of Shares Buy Back by a Company pursuant to Form 28B" :
					$html = $this->categoryNoticeShareBuyBack28B($announce);
					break;
				case "Notice of Shares Buy Back - Immediate Announcement" :
					$html = $this->categoryShareBuyBackImmediate($announce);
					break;
				default:
					$check =1;
			}

//			$this->info($html);
//			if($html){return false;}
//			continue;


			if($html){
				
				Announcement::where ( 'id', '=', $announce['id'] )->update(array('crawled'=> 1));
				
				$data = array();
				$data['announcement_id'] = $announce['id'];
				$data['title'] = $announce['title'];
				$data['category'] = $announce['category'];
				$data['date_of_publishing'] = $announce['date_of_publishing'] !== "" && $announce['date_of_publishing'] !== null ? date('Y-m-d',strtotime($announce['date_of_publishing'])) : $announce['date_of_publishing'];
				$data['html'] = $html;
				$data['reference_no'] = $announce['reference_no'];
				$data['status'] = $announce['status'];

				
				CrawledAnnounce::insert($data);

				
			} 
		}
		
		die;
	}

	private function categoryDocumentSubmission($html = NULL){
		if(!$html){
			return;
		}

		$crawler = new Crawler ( $html );

		$filename = $crawler->filter ( '.att_download_pdf > a' )->text ();
		$filesize = $crawler->filter ( '.att_download_pdf > .FootNote' )->text ();


		$view = View::make ( 'template_document_submission', array (
			'filename' => $filename,
			'filesize' => $filesize,
		) );


		return $view;

	}

	private function categoryEntitlements($html = NULL) {
		if ($html) {

			

			$crawler = new Crawler ( $html );
				
			$title = $crawler->filter ( '#main > h3' )->text ();
				
			

			$nodeValues = $crawler->filter('table tr')->each ( function (Crawler $node, $i) {
				if($node->parents()->parents()->attr("id") == 'divRemarks'){
					return false;
				}
				
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			});

			$data = array ();
				
			foreach ($nodeValues as $node) {
				if($node!=null)
				{
					$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
				}
			}

			$nodeValues = $crawler->filter('#divRemarks table tr td')->each ( function (Crawler $node, $i) {
				 return $node->html();
			});

			
			$remark = (isset ( $nodeValues [1] )) ? $nodeValues [1] : '';
			$view = View::make ( 'template_entitlements', array (
					'title' => $title,
					'data' => $data,
					'remark' => $remark
			) );
				
			$sections = $view->renderSections ();
				
			return $sections ['content'];
		}
		return ;
	}
	
	private function categoryInvestorAlert($html = NULL) {
		if ($html) {
			$crawler = new Crawler ( $html );
				
			$title = $crawler->filter ( '#main > h3' )->text ();
				
			$nodeValues = $crawler->filter ( '#main p' )->each ( function (Crawler $node, $i) {
				if($node->html())
					return $node->html();
				else 
					return false;
			} );
			
			$nodeValues = array_filter($nodeValues);
			
			$data = strip_tags(implode("<br><br>", $nodeValues), "<br><p><a><stronng>");

			//$this->pr($nodeValues);
				
			$view = View::make ( 'template_ala', array (
					'title' => $title,
					'content' => $data
			) );
				
			$sections = $view->renderSections ();
				
			return $sections ['content'];
		}
		return ;
	}
	
	private function categoryAla($html = NULL) {
		if ($html) {
			$crawler = new Crawler ( $html );
			
			$title = $crawler->filter ( '#main > h3' )->text ();
			
			$nodeValues = $crawler->filter ( 'table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
			
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
			
			$view = View::make ( 'template_ala', array (
					'title' => $title,
					'data' => $data 
			) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
		
	private function categoryListingCircular($html = NULL) {
		if ($html) {
			$crawler = new Crawler ( $html );
			
			$title = $crawler->filter ( '#main > h3' )->text ();
			$title2 = $crawler->filter ( '#main h4' )->text ();
			$title3 = $title2;
			$node = $crawler->filter('ul strong > font');
			if ($node->count() > 0) {	
				$title3 = $node->eq(0)->html();
			}
			
			$nodeValues = $crawler->filter ( 'table tr' )->each ( function (Crawler $node, $i) {
				return $node->children ()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
			
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
			
			$node = $crawler->filter('ul');
			if ($node->count() > 0) {
				$content = explode("<br><br>", $crawler->filter ( 'ul' )->eq(0)->html());
			} else {
				$content = $crawler->filter('#main > p')->each(function (Crawler $node, $i) {
					return $node->text();
				});
			}
			
			
			$list = array();
			$remark = '';
			$listcount = 1;
			foreach($content as $k => $c){
				if(starts_with(preg_replace ( "/\r|\n/", "", $c ), $listcount.")")){
					$list[$listcount] = substr($c, 4, strlen($c));
					$listcount++;
				} else if(starts_with(strip_tags($c), "Remark") || $remark != ''){
					$remark .= $c;
				} else if($listcount > 1 && $remark == ''){
					$list[$listcount - 1] .= "<br>".$c;
				} 
			}
			$view = View::make ( 'template_listing_circular', array (
					'title' => $title,
					'title2' => $title2,
					'title3' => $title3,
					'list' => $list,
					'remark' => $remark,
					'data' => $data 
			) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
        private function categoryFinancialResults($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			$title = $crawler->filter ( '#main > h3' )->text();
			
			/* $nodeValues = $crawler->filter ( 'table.formContentTable tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} ); */
			$nodeValues = $crawler->filter ( 'table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        $nodeValues = array_filter($nodeValues);
			$data = array ();

			
			
			foreach ( $nodeValues as $node ) {
				if($node!=null)
				{
					$data [($node [0]) ? trim(preg_replace ( array("/\r|\n/", "/\s+/"), array("", " "), $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
				}
			}

			
			
			//$this->pr($data); die;
                        
                        /***** Attachment ************/
						
						try {
			$data['Attachments'] = $crawler->filter ( 'table.att_table p.att_download_pdf a' )->text ();

						 } catch (\InvalidArgumentException $e) {
		}
			
			/**************Currency Detail ******************/
	   
			try {
				$data['CurrTitle'] = strip_tags(str_replace('<br>',' ',$crawler->filter ( '#Tab1  tr td' )->eq(0)->html()));
			 } catch (\InvalidArgumentException $e) {
			 }
		   
            $tableValues = $crawler->filter ( 'table.ven_table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
			
			// print_r($tableValues);
			// exit;	
            //$this->pr($data); die;
                        
			$view = View::make ( 'template_financial_results', array (
					'title' => $title,
					'data' => $data,
					'attached'=> 'http://bursa.ock.net.my/attachments/' . $html['attachment_location_ondisk'],
					'tableValues'=>$tableValues
            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
		private function categoryGeneralAnnouncement($html = NULL) {
            
            if ($html['html']) {
				
				$crawler = new Crawler ( $html['html'] );
				try{
				$title = $crawler->filter ( '#main > h3' )->text();
				}catch(Exception $e){
					echo $html['id']; die;
				}
				$nodeValues = $crawler->filter ( 'table.InputTable2 > tr' )->each ( function (Crawler $node, $i) {
					return $node->children()->each ( function (Crawler $n, $j) {
						return preg_replace('/style=".*?"/', '', $n->html());
					} );
				} );
				$nodeValues = array_filter($nodeValues);
				
				$data = array ();

				
				
				foreach ( $nodeValues as  $k => $node ) {
					
					if($k == 3){
					  $data['Bottom Footer'] = $node [0];
					} else {
						$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? strip_tags($node [1], "<p><strong><em>") : '';
					}
					
				}
				
				$nodeValues = $crawler->filter ( 'table > tr' )->each ( function (Crawler $node, $i) {
					return $node->children()->each ( function (Crawler $n, $j) {
						return preg_replace('/style=".*?"/', '', $n->html());
					} );
				} );
				$nodeValues = array_filter($nodeValues);
				
				$data2 = array ();
				
				foreach ( $nodeValues as  $k => $node ) {
					$data2 [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? strip_tags($node [1], "<p><strong><em>") : '';
						
				}
				
				$data = array_merge($data2, $data);
				
				if ($crawler->filter('table.att_table p.att_download_pdf a')->count() > 0) {
					$data['Attachments'] = $crawler->filter ( 'table.att_table p.att_download_pdf a' )->text();
				}

				
				
				
				$view = View::make ( 'template_general_announcments', array (
						'subtitle' => $title,
						'data' => $data,
						'attached'=> 'http://bursa.ock.net.my/attachments/' . $html['attachment_location_ondisk']
	                            ) );
				
				$sections = $view->renderSections ();
				
				return $sections ['content'];
			}
			return ;
		}
        
        private function categoryGeneralMeetings($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			$title = $crawler->filter ( '#main > h3' )->text();
			
			$nodeValues = $crawler->filter ( '#main table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
			
			$nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
			
			if ($crawler->filter('table.att_table p.att_download_pdf a')->count() > 0) {
				$data['Attachments'] = $crawler->filter ( 'table.att_table p.att_download_pdf a' )->text();
			}
			
			$view = View::make ( 'template_general_meetings', array (
					'attached'=> 'http://bursa.ock.net.my/attachments/' . $html['attachment_location_ondisk'],
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
        private function categorySpecialAnnouncements($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			$title = $crawler->filter ( '#main > h3' )->text();
			
			$nodeValues = $crawler->filter ( '#main > p' )->each ( function (Crawler $node, $i) {
					return $n->html();
			});
            
			$data = implode('</p><p>', array_filter($nodeValues));
			
			$view = View::make ( 'template_special_announcement', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        private function categoryChangesDirectorsInterest($html = NULL) {
            
           if ($html['html']) {

			
			
			$crawler = new Crawler ( $html['html'] );
			
			$title = $crawler->filter ( '#main > h3' )->text();
			
			$nodeValues = $crawler->filter ( '#main table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );

			$nodeValues = array_filter($nodeValues);

			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}

			
                        
            $dataTable = $crawler->filter ( '.ven_table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					
					return $n->text ();
				});
			});

			
			$composition = $crawler->filter ( 'table.InputTable2 tr:last-child td:last-child' )->html();
            $footnote = explode("<br>", $composition);
			
			

			// $footnote = explode("<br><br>", $crawler->filter ( 'table tr td.FootNote' )->html());

			
			
			// end($footnote);
			// unset($footnote[key($footnote)]);

			
			
			foreach($footnote as $key => $foot){
				$length = strpos($foot," ",0);
				$substrKey = substr($foot, $length);
				
				$footnote[$key] = $substrKey;
			}

			
            // $this->pr($footnote);
			$view = View::make ( 'template_director_interest', array (
					'data' => $data,
					'dataTable' => $dataTable,
                    'footnote' => $footnote
			));
			
			
			
			$sections = $view->renderSections();

			return $sections ['content'];
		}
		return ;
	}
        
        private function categoryChangesSubstantialShareHolder($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( '#main table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
            $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
            $dataTable = $crawler->filter ( '.ven_table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
			$view = View::make ( 'template_substantial_shareholder', array (
					'title' => $title,
					'data' => $data,
					'dataTable' => $dataTable
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
        private function categoryNoticeInterestShareholder($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( '#main table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                     //   $this->pr($data);
            $view = View::make ( 'template_notice_shareholder', array (
					'title' => $title,
					'data' => $data,
             ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
        private function categoryChnageAuditCommittee($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        $composition = $crawler->filter ( 'table.InputTable2 tr:last-child td:last-child' )->html();
                        $footnote = explode("<br>", $composition);
                        
                            $view = View::make ( 'template_change_audit_committee', array (
					'data' => $data,
					'footnote' => $footnote,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}

	private function categoryChnageNominationCommittee($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        $composition = $crawler->filter ( 'table.InputTable2 tr:last-child td:last-child pre' )->html();
                        $footnote = explode("<br>", $composition);
                        
                            $view = View::make ( 'template_change_nomination_committee', array (
					'data' => $data,
					'footnote' => $footnote,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
        private function categoryChnageBoardroom($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                        //$this->pr($data);
                            $view = View::make ( 'template_change_boardroom', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
                
        private function categoryChnagePrincipalOfficer($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
			
			$nodeValues = $crawler->filter('#divRemarks table tr td')->each ( function (Crawler $node, $i) {
				return $node->html();
			});
					
				$remark = (isset ( $nodeValues [1] )) ? $nodeValues [1] : '';
                        
                       // $this->pr($data);
            $view = View::make ( 'template_change_principal_officer', array (
					'data' => $data,
            		'remark' => $remark
            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
                
        private function categoryChangeAddress($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
            $nodeValues = array_filter($nodeValues);
			
            $data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
			$data = array_change_key_case ( $data );
            $view = View::make ( 'template_change_address', array (
					'data' => $data,
            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
                
        private function categoryChangeRegistrarDetail($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                            $view = View::make ( 'template_registrar_detail', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
                
        private function categoryResaleCancellation($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                            $view = View::make ( 'template_resale_cancellation', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
                
        private function categoryNoticeShareBuyBack($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                            $view = View::make ( 'template_notice_share_buy_back', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}                
                
        private function categoryShareBuyBackImmediate($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                            $view = View::make ( 'template_share_buy_back_immediate', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
                
        private function categoryNoticeShareBuyBack28B($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                            $view = View::make ( 'template_notice_share_buy_back28B', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
        private function categoryPersonCeasing($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                            $view = View::make ( 'template_person_ceasing', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
        private function categoryExecutiveOfficer($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                            $view = View::make ( 'template_executive_officer', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
        
        private function categoryCompanySecretary($html = NULL) {
            
           if ($html['html']) {
			$crawler = new Crawler ( $html['html'] );
			
			//$title = $crawler->filter ( '#main > h4' )->text();
			
			$nodeValues = $crawler->filter ( 'table.InputTable2 tr' )->each ( function (Crawler $node, $i) {
				return $node->children()->each ( function (Crawler $n, $i) {
					return $n->text ();
				} );
			} );
                        
                        $nodeValues = array_filter($nodeValues);
			$data = array ();
			
			foreach ( $nodeValues as $node ) {
				$data [($node [0]) ? trim(preg_replace ( "/\r|\n/", "", $node [0] )) : ''] = (isset ( $node [1] )) ? $node [1] : '';
			}
                        
                            $view = View::make ( 'template_company_secretary', array (
					'data' => $data,
                            ) );
			
			$sections = $view->renderSections ();
			
			return $sections ['content'];
		}
		return ;
	}
}
