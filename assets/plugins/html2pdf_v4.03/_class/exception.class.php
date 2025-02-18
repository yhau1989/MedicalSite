<?php

class HTML2PDF_exception extends exception
{
    protected $_tag = null;
    protected $_html = null;
    protected $_other = null;
    protected $_image = null;
    protected $_messageHtml = '';

   /**/
      @param   
      @param    
      @return   
    
    final public function __construct($err = 0, $other = null, $html = '')
    {
       
        switch($err)
        {
            case 1:
                $msg = (HTML2PDF_locale::get('err01'));
                $msg = str_replace('[[OTHER]]', $other, $msg);
                $this->_tag = $other;
                break;

            case 2:
                $msg = (HTML2PDF_locale::get('err02'));
                $msg = str_replace('[[OTHER_0]]', $other[0], $msg);
                $msg = str_replace('[[OTHER_1]]', $other[1], $msg);
                $msg = str_replace('[[OTHER_2]]', $other[2], $msg);
                break;

            case 3: 
                $msg = (HTML2PDF_locale::get('err03'));
                $msg = str_replace('[[OTHER]]', $other, $msg);
                $this->_tag = $other;
                break;

            case 4: 
                $msg = (HTML2PDF_locale::get('err04'));
                $msg = str_replace('[[OTHER]]', print_r($other, true), $msg);
                break;

            case 5: 
                $msg = (HTML2PDF_locale::get('err05'));
                $msg = str_replace('[[OTHER]]', print_r($other, true), $msg);
                break;

            case 6: 
                $msg = (HTML2PDF_locale::get('err06'));
                $msg = str_replace('[[OTHER]]', $other, $msg);
                $this->_image = $other;
                break;

            case 7:
                $msg = (HTML2PDF_locale::get('err07'));
                break;

            case 8: 
                $msg = (HTML2PDF_locale::get('err08'));
                $msg = str_replace('[[OTHER]]', $other, $msg);
                $this->_tag = $other;
                break;

            case 9: 
                $msg = (HTML2PDF_locale::get('err09'));
                $msg = str_replace('[[OTHER_0]]', $other[0], $msg);
                $msg = str_replace('[[OTHER_1]]', $other[1], $msg);
                $this->_tag = $other[0];
                break;

            case 0: 
            default:
                $msg = $other;
                break;
        }

        
        $this->_messageHtml = '<span style="color: #AA0000; font-weight: bold;">'.HTML2PDF_locale::get('txt01', 'error: ').$err.'</span><br>';
        $this->_messageHtml.= HTML2PDF_locale::get('txt02', 'file:').' '.$this->file.'<br>';
        $this->_messageHtml.= HTML2PDF_locale::get('txt03', 'line:').' '.$this->line.'<br>';
        $this->_messageHtml.= '<br>';
        $this->_messageHtml.= $msg;

        
        $msg = HTML2PDF_locale::get('txt01', 'error: ').$err.' : '.strip_tags($msg);

        
        if ($html) {
            $this->_messageHtml.= "<br><br>HTML : ...".trim(htmlentities($html)).'...';
            $this->_html = $html;
            $msg.= ' HTML : ...'.trim($html).'...';
        }

        
        $this->_other = $other;

        
        parent::__construct($msg, $err);
    }

   
      @access public
      @return 
     
    public function __toString()
    {
        return $this->_messageHtml;
    }

    

      @access public
      @return 
     
    public function getTAG()
    {
        return $this->_tag;
    }

      @access public
      @return 
     
    public function getHTML()
    {
        return $this->_html;
    }

    
      @access public
      @return mixed $other
     
    public function getOTHER()
    {
        return $this->_other;
    }

    
      @access public
      @return string $imageSrc
     
    public function getIMAGE()
    {
        return $this->_image;
    }
}