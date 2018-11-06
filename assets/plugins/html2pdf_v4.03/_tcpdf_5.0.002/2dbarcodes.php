<?php

class TCPDF2DBarcode {

	
	protected $barcode_array = false;

	
	public function __construct($code, $type) {
		$this->setBarcode($code, $type);
	}

	
	public function getBarcodeArray() {
		return $this->barcode_array;
	}

	
	public function setBarcode($code, $type) {
		$mode = explode(',', $type);
		$qrtype = strtoupper($mode[0]);
		switch ($qrtype) {
			case 'QRCODE': { // QR-CODE
				require_once(dirname(__FILE__).'/qrcode.php');
				if (!isset($mode[1]) OR (!in_array($mode[1],array('L','M','Q','H')))) {
					$mode[1] = 'L'; // Ddefault: Low error correction
				}
				$qrcode = new QRcode($code, strtoupper($mode[1]));
				$this->barcode_array = $qrcode->getBarcodeArray();
				break;
			}
			case 'RAW':
			case 'RAW2': { // RAW MODE
				// remove spaces
				$code = preg_replace('/[\s]*/si', '', $code);
				if (strlen($code) < 3) {
					break;
				}
				if ($qrtype == 'RAW') {
					// comma-separated rows
					$rows = explode(',', $code);
				} else {
					// rows enclosed in square parethesis
					$code = substr($code, 1, -1);
					$rows = explode('][', $code);
				}
				$this->barcode_array['num_rows'] = count($rows);
				$this->barcode_array['num_cols'] = strlen($rows[0]);
				$this->barcode_array['bcode'] = array();
				foreach ($rows as $r) {
					$this->barcode_array['bcode'][] = str_split($r, 1);
				}
				break;
			}
			case 'TEST': { // TEST MODE
				$this->barcode_array['num_rows'] = 5;
				$this->barcode_array['num_cols'] = 15;
				$this->barcode_array['bcode'] = array(
					array(1,1,1,0,1,1,1,0,1,1,1,0,1,1,1),
					array(0,1,0,0,1,0,0,0,1,0,0,0,0,1,0),
					array(0,1,0,0,1,1,0,0,1,1,1,0,0,1,0),
					array(0,1,0,0,1,0,0,0,0,0,1,0,0,1,0),
					array(0,1,0,0,1,1,1,0,1,1,1,0,0,1,0));
				break;
			}
			default: {
				$this->barcode_array = false;
			}
		}
	}
} // end of class

//============================================================+
// END OF FILE
//============================================================+
?>
