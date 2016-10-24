<?php

require_once "config.php";


/*
 *	1. $this->member for non-static members, use self::$member for static members
 *	2. isset($var) checks the existance of the variable $var
 *	3. filter_var($variable, $filter, $options) -> check if $variable is a valid variable which conform the $filter
 *	4. CURLOPT_URL - provide the URL to use in the request
 *	5 . CURLOPT_RETURNTRANSFER (the returned transfer is aka the reponse)
 *		- true: transfer will be returned as a string of the return value of curl_exec()
 *		- false: transfer will not be returned and instead displayed in browser
 */
class Download {
	const URL_MAX_LENGTH = 2050;
	protected function cleanURL($url) {
		//
		if (isset ( $url )) {
			if (! empty ( $url )) {
				if (strlen ( $url ) < self::URL_MAX_LENGTH) {
					return strip_tags ( $url );
				}
			}
		}
	}
	protected function isURL($url) {
		$url = $this->cleanURL ( $url );
		if (isset ( $url )) {
			if (filter_var ( $url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED )) {
				return $url;
			}
		}
	}
	protected function returnExtention($url) {
		if ($this->isURL ( $url )) {
			$end = end ( preg_split( "/[.]+/", $url ) );
			if (isset ( $end )) {
				return $end;
			}
		}
	}
	public function downloadFile($url) {
		if ($this->isURL ( $url )) {
			$extension = $this->returnExtention ( $url );
			if ($extension) {
				// curl request
				$ch = curl_init ();
				curl_setopt ( $ch, CURLOPT_URL, $url );
				curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
				$return = curl_exec ( $ch );
				curl_close ( $ch );
				
				$destination = "downloads/file.$extension";
				$fp = fopen ( $destination, "w+" );
				fputs ( $fp, $return );
				
				if (fclose ( $fp )) {
					echo "File Downloaded";
				}
			}
		}
	}
}
class Upload {
//	public static function testFunction() {
// 		$data = array (
// 				"name" => "dyao",
// 				"age" => "40" 
// 		);
// 		$str = http_build_query ( $data );
// 		// echo $str;
// 		$ch = curl_init ();
// 		curl_setopt ( $ch, CURLOPT_URL, "http://localhost/PHPFileSharingApp/data.php" );
// 		curl_setopt ( $ch, CURLOPT_POST, true );
// 		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $str );
// 		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
// 		$response = curl_exec ( $ch );
// 		curl_close ( $ch );
// 	}
	public static function uploadFile($requestURL, $email) {
		// echo "uploadFile() called";
		if (isset ( $_FILES ["fileToUpload"] ["tmp_name"] )) {
			//echo "<b>util.php response: </b>" . $_FILES["fileToUpload"]["tmp_name"] . "<br>";
			//echo "<b>util.php response: </b>" . $_FILES["fileToUpload"]["name"] . "<br>";
			//echo "<b>util.php response: </b>" . $_FILES["fileToUpload"]["type"] . "<br>";
			//echo "<b>util.php response: </b>" . $_FILES["fileToUpload"]["size"] . "<br>";
			//echo "<b>util.php response: </b>" . $_FILES["fileToUpload"]["error"] . "<br>";

			
			$aPost = array(
					//'file' => "@".$localFile,
					Constants::FILE_CONTENT => "@".$_FILES["fileToUpload"]["tmp_name"],
					Constants::FILE_NAME =>$_FILES["fileToUpload"]["name"],
					"SessionEmail"=>$email
			);
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $requestURL);
			curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
			curl_setopt($ch, CURLOPT_TIMEOUT, 120);
			curl_setopt($ch, CURLOPT_BUFFERSIZE, 128);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $aPost);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec ($ch);
			if ($response == true) {
				echo $response;
				echo "File posted";
			} else {
				echo "Error: " . curl_error ( $ch );
			}
			
			
/*			
			$cfile = new CURLFile ( $_FILES ["fileToUpload"] ["tmp_name"], $_FILES ["fileToUpload"] ["type"], $_FILES ["fileToUpload"] ["name"] );

			$data = array (
				Constants::FILE_TRANSFER_NAME =>$cfile
			);

			$ch = curl_init ();
			curl_setopt($ch, CURLOPT_URL, $requestURL);
			curl_setopt ($ch, CURLOPT_POST, true );
			curl_setopt ($ch, CURLOPT_POSTFIELDS, $data );
						
			$response = curl_exec ( $ch );
			if ($response == true) {
				echo $response;
				echo "File posted";
			} else {
				echo "Error: " . curl_error ( $ch );
			}
*/				
			

			

		}
	}
}

?>