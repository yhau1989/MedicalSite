<?php


class HTML2PDF_locale
{
 @var 
    static protected $_code = null;

    
      @var array
    static protected $_list = array();

    
    @var 
    static protected $_directory = null;

    
           @access public
      @param  string $code
     
    static public function load($code)
    {
        if (self::$_directory===null) {
            self::$_directory = dirname(dirname(__FILE__)).'/locale/';
        }

        
        $code = strtolower($code);

    
        if (!preg_match('/^([a-z0-9]+)$/isU', $code)) {
            throw new HTML2PDF_exception(0, 'invalid language code ['.self::$_code.']');
        }

        self::$_code = $code;

    
        $file = self::$_directory.self::$_code.'.csv';

        
        if (!is_file($file)) {
            throw new HTML2PDF_exception(0, 'language code ['.self::$_code.'] unknown. You can create the translation file ['.$file.'] and send it to the of html2pdf in order to integrate it into a future release');
        }

        
        self::$_list = array();
        $handle = fopen($file, 'r');
        while (!feof($handle)) {
            $line = fgetcsv($handle);
            if (count($line)!=2) continue;
            self::$_list[trim($line[0])] = trim($line[1]);
        }
        fclose($handle);
    }

    
      @access public static
    static public function clean()
    {
        self::$_code = null;
        self::$_list = array();
    }

    
      @access public static
      @param  
      @return 
     
    static public function get($key, $default='######')
    {
        return (isset(self::$_list[$key]) ? self::$_list[$key] : $default);
    }
}