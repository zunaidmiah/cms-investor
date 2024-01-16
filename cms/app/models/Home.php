<?php

class Home extends \Eloquent {
	protected $fillable = [];
        protected $table = 'vacancies';

	// Process CV file
	public function process_cv($cv_path, $cv_file)
	{
		// Transfer uploaded applicant's CV file to ftp location
		static::ftp_put($cv_file, $cv_path, '/CV/'.$cv_file);
	}

	// Make Csv file for the new application and transfer it to ftp location
	public function process_csv()
	{
		// Retrieve current vacancy as assoc array
		$curr_vac = $this->find($this->id)->toArray();

		// Make CSV row with header for this application record...
		$csv_header = '"'.implode('","', array_keys($curr_vac)).'"';
		$csv_row = '"'.implode('","', array_values($curr_vac)).'"';
//echo '<pre>';
//dd($vacancy);
//echo '</pre>';

		// save them to temp file
		$csv_path = app_path().'/storage/';
		$csv_file = 'ocknetmy_cms-vacancies-'.$this->name.'.csv';
		file_put_contents($csv_path.$csv_file, $csv_header.PHP_EOL.$csv_row);

		// Transfer uploaded applicant's CV file to ftp location
		static::ftp_put($csv_file, $csv_path, '/CSV/'.$csv_file);

		// Del temp file
		unlink($csv_path.$csv_file);
	}

	
	// Transfer file to ftp location
	public static function ftp_put($file, $path = '', $remote = NULL)
	{
		$server = '192.168.1.14';			// Can connect
	//	$server = '103.246.89.162';			// Can't connect
		$user	= "vacancy@ock.net.my";
		$pass	= "148bDZa&)26{X21";

	//	$file	= 'ftp.php';
		$local	= $path.$file;
		if (is_null($remote)) {
			$remote = $file;
		}

		if (! ($ftp = ftp_connect($server))) {
			return FALSE;
		}

		if (! ftp_login($ftp, $user, $pass)) {
			return FALSE;
		}
		ftp_pasv($ftp, true);

		// chdir to the correct directory
		//ftp_chdir($ftp, "/CSV/");

		if (! ftp_put($ftp, $remote, $local, FTP_BINARY)) {
			return FALSE;
		}

		// close the connection
		ftp_close($ftp);  

		return TRUE;
	}
}