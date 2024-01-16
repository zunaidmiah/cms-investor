<?php 

return [

  'APP_NAME'		=> 'LARAVEL',
  
  /* APP URL WRAPPER */
  'APP_URL'		=> 'http://ocklive.com/',
  'BURSA_SUBDOMAIN' 	=> 'https://bursa.fareastholdingsbhd.com/',
  'CHART_SUBDOMAIN'	=> 'https://charts.fareastholdingsbhd.com/',
  'MEDIANEWS_SUBDOMAIN'	=> 'https://medianews.fareastholdingsbhd.com/',
  'CMS_SUBDOMAIN'	=> 'https://cms.fareastholdingsbhd.com/',
  'INVESTOR_DOMAIN'     => 'https://fareastholdingsbhd.com/',
  'LARAVEL_SUBDOMAIN'     => 'https://laravel.fareastholdingsbhd.com/',
  
  /* APP MAIL HOST */
  'MAIL_MAILER' 	=> 'smtp',
  'MAIL_HOST'		=> 'vm1.webqomhosting1.com',
  'MAIL_PORT'		=> 465,
  'MAIL_USERNAME'	=> 'web88support@webqom.com',
  'MAIL_PASSWORD'	=> '1256%IM~(3nm9D~@',
  'MAIL_ENCRYPTION'	=> 'ssl',
  'MAIL_FROM_ADDRESS'	=> 'web88support@webqom.com',
  'MAIL_FROM_NAME'	=> null,

  'MAIL_MAILER_BURSA' 		=> 'mail',
  'MAIL_HOST_BURSA'		=> 'smtp.mailgun.org',
  'MAIL_PORT_BURSA'		=> 587,
  'MAIL_USERNAME_BURSA'		=> null,
  'MAIL_PASSWORD_BURSA'		=> null,
  'MAIL_ENCRYPTION_BURSA'	=> 'tls',
  'MAIL_FROM_ADDRESS_BURSA'	=> 'hock@webqom.com',
  'MAIL_FROM_NAME_BURSA'	=> 'Webqom',

  'MAIL_MAILER_CHART' 		=> 'smtp',
  'MAIL_HOST_CHART'		=> 'localhost',
  'MAIL_PORT_CHART'		=> 25,
  'MAIL_USERNAME_CHART'		=> 'laravel@ock.net.my',
  'MAIL_PASSWORD_CHART'		=> 'admin123',
  'MAIL_ENCRYPTION_CHART'	=> 'tls',
  'MAIL_FROM_ADDRESS_CHART'	=> 'laravel@ock.net.my',
  'MAIL_FROM_NAME_CHART'	=> 'Charts Admin',

  'MAIL_MAILER_FAREASTHOLDING'		=> 'smtp',
  'MAIL_HOST_FAREASTHOLDING'		=> 'mail.fareastholdingsbhd.com',
  'MAIL_PORT_FAREASTHOLDING'		=> 25,
  'MAIL_USERNAME_FAREASTHOLDING'	=> 'web88ir@fareastholdingsbhd.com',
  'MAIL_PASSWORD_FAREASTHOLDING'	=> '935if)wg2mKG+Vo',
  'MAIL_ENCRYPTION_FAREASTHOLDING'	=> 'tls',
  'MAIL_FROM_ADDRESS_FAREASTHOLDING'	=> 'web88ir@fareastholdingsbhd.com',
  'MAIL_FROM_NAME_FAREASTHOLDING'	=> null,

  /* DB CONNECTION */
  'CONNECTION_NAME'	=> 'cms',	  
  'DB_CONNECTION'	=> 'mysql',
  'DB_HOST'		=> 'localhost',
  'DB_PORT'		=> 3306,
  'DB_DATABASE'		=> 'fareastholdingsb_cms',
  'DB_USERNAME'		=> 'fareasth_cms',
  'DB_PASSWORD'		=> '14422{p[P}yB29~x+',
  
  'CONNECTION_NAME2'	=> 'medianews',	 
  'DB_CONNECTION2'	=> 'mysql',
  'DB_HOST2'		=> 'localhost',
  'DB_PORT2'		=> 3306,
  'DB_DATABASE2'	=> 'fareastholdingsb_ock',
  'DB_USERNAME2'	=> 'fareasth_connect',
  'DB_PASSWORD2'	=> '142TZ5yNzUf!13p',
  
  'CONNECTION_NAME3'	=> 'charts',	
  'DB_CONNECTION3'	=> 'mysql',
  'DB_HOST3'		=> 'localhost',
  'DB_PORT3'		=> 3306,
  'DB_DATABASE3'	=> 'fareastholdingsb_chart',
  'DB_USERNAME3'	=> 'fareasth_chart',
  'DB_PASSWORD3'	=> '142KS(p([i{ZV9Q',
  
  'CONNECTION_NAME4'	=> 'bursa',	
  'DB_CONNECTION4'	=> 'mysql',
  'DB_HOST4'		=> 'localhost',
  'DB_PORT4'		=> 3306,
  'DB_DATABASE4'	=> 'fareastholdingsb_bursa',
  'DB_USERNAME4'	=> 'fareasth_bursa',
  'DB_PASSWORD4'	=> '1410Qf-9Hv.SH(g',
  
  'CONNECTION_NAME5'	=> 'connect',	
  'DB_CONNECTION5'	=> 'mysql',
  'DB_HOST5'		=> 'localhost',
  'DB_PORT5'		=> 3306,
  'DB_DATABASE5'	=> 'fareastholdingsb_cms',
  'DB_USERNAME5'	=> 'fareasth_connect',
  'DB_PASSWORD5'	=> '142TZ5yNzUf!13p',
  
  'CONNECTION_NAME6'	=> 'nanyang',	
  'DB_CONNECTION6'	=> 'mysql',
  'DB_HOST6'		=> 'localhost',
  'DB_PORT6'		=> 3306,
  'DB_DATABASE6'	=> 'fareastholdingsb_nanyang',
  'DB_USERNAME6'	=> 'fareasth_ock',
  'DB_PASSWORD6'	=> '142G#K7ELFW,qAC',
  
  'CONNECTION_NAME7'	=> 'dev',	
  'DB_CONNECTION7'	=> 'mysql',
  'DB_HOST7'		=> 'localhost',
  'DB_PORT7'		=> 3306,
  'DB_DATABASE7'	=> 'fareastholdingsb_dev',
  'DB_USERNAME7'	=> 'fareasth_dev',
  'DB_PASSWORD7'	=> '1429[V]0x6aut48',
  
  'CONNECTION_NAME8'	=> 'ock',	
  'DB_CONNECTION8'	=> 'mysql',
  'DB_HOST8'		=> 'localhost',
  'DB_PORT8'		=> 3306,
  'DB_DATABASE8'	=> 'fareastholdingsb_ock',
  'DB_USERNAME8'	=> 'fareasth_ock',
  'DB_PASSWORD8'	=> '142G#K7ELFW,qAC',
  
  'CONNECTION_NAME9'	=> 'yahoo',	
  'DB_CONNECTION9'	=> 'mysql',
  'DB_HOST9'		=> 'localhost',
  'DB_PORT9'		=> 3306,
  'DB_DATABASE9'	=> 'fareastholdingsb_yahoo',
  'DB_USERNAME9'	=> 'fareasth_ock',
  'DB_PASSWORD9'	=> '142G#K7ELFW,qAC',
	

  'APP_TIMEZONE'	=> 'Asia/Kuala_Lumpur',
  'SINGAPORE_TIMEZONE'	=> 'Asia/Singapore',
  'UTC_TIMEZONE'	=> 'UTC',
  'APP_LOCALE'		=> 'en',
  'APP_KEY'		=> 'BRERurLNatMfeMNZlNRSXGbiU3yqvow5',
  
  'AWS_ACCESS_KEY_ID'	=> '',
  'AWS_SECRET_ACCESS_KEY'	=> '',
  'AWS_DEFAULT_REGION'		=> 'us-east-1',
  'AWS_BUCKET'			=> '',

  'PUSHER_APP_ID'		=> '',
  'PUSHER_APP_KEY'		=> '',
  'PUSHER_APP_SECRET'		=> '',
  'PUSHER_APP_CLUSTER'		=> 'mt1',
  
  'BROADCAST_DRIVER'	=> 'log',
  'CACHE_DRIVER'	=> 'file',
  'QUEUE_CONNECTION'	=> 'sync',
  'SESSION_DRIVER'	=> 'file',
  'SESSION_LIFETIME'	=> 120,

  'REDIS_HOST'		=> '127.0.0.1',
  'REDIS_PASSWORD'	=> null,
  'REDIS_PORT'		=> 6379
   
];