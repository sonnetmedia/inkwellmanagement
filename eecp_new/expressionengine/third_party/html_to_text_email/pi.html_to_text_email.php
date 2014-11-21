<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
=====================================================
 Natural Logic
-----------------------------------------------------
 http://natural-logic.com/
-----------------------------------------------------
 Copyright (c) 2010 Natural Logic, LLC
=====================================================
 Based on work done by Jon Abernathy <jon@chuggnutt.com>
=====================================================
 File: pi.html_to_text_email.php
-----------------------------------------------------
 Purpose: Converts HTML to Plain Text suitable 
          for Text Emails for use with Champagne, http://natural-logic.com/software/champagne/
=====================================================

*/


$plugin_info = array(
						'pi_name'			=> 'HTML to Text Email',
						'pi_version'		=> '2.0',
						'pi_author'			=> 'Jason Ferrell',
						'pi_author_url'		=> 'http://natural-logic.com/',
						'pi_description'	=> 'Converts HTML to Plain Text suitable for Text Emails',
						'pi_usage'			=> html_to_text_email::usage()
					);


class Html_to_text_email {

    var $return_data;
	var $width = 65;
	var $url;
    var $_link_list = '';
    var $_link_count = 0;
	
    var $search = array(
        "/\r/",                                  // Non-legal carriage return
        "/[\n\t]+/",                             // Newlines and tabs
        '/[ ]{2,}/',                             // Runs of spaces, pre-handling
        '/<script[^>]*>.*?<\/script>/i',         // <script>s -- which strip_tags supposedly has problems with
        '/<style[^>]*>.*?<\/style>/i',           // <style>s -- which strip_tags supposedly has problems with
        //'/<!-- .* -->/',                         // Comments -- which strip_tags might have problem a with
        '/<h[123][^>]*>(.*?)<\/h[123]>/ie',      // H1 - H3
        '/<h[456][^>]*>(.*?)<\/h[456]>/ie',      // H4 - H6
        '/<p[^>]*>/i',                           // <p>
        '/<br[^>]*>/i',                          // <br>
        '/<b[^>]*>(.*?)<\/b>/ie',                // <b>
        '/<strong[^>]*>(.*?)<\/strong>/ie',      // <strong>
        '/<i[^>]*>(.*?)<\/i>/i',                 // <i>
        '/<em[^>]*>(.*?)<\/em>/i',               // <em>
        '/(<ul[^>]*>|<\/ul>)/i',                 // <ul> and </ul>
        '/(<ol[^>]*>|<\/ol>)/i',                 // <ol> and </ol>
        '/<li[^>]*>(.*?)<\/li>/i',               // <li> and </li>
        '/<li[^>]*>/i',                          // <li>
        '/<a [^>]*href="([^"]+)"[^>]*>(.*?)<\/a>/ie',
                                                 // <a href="">
        '/<hr[^>]*>/i',                          // <hr>
        '/(<table[^>]*>|<\/table>)/i',           // <table> and </table>
        '/(<tr[^>]*>|<\/tr>)/i',                 // <tr> and </tr>
        '/<td[^>]*>(.*?)<\/td>/i',               // <td> and </td>
        '/<th[^>]*>(.*?)<\/th>/ie',              // <th> and </th>
        '/&(nbsp|#160);/i',                      // Non-breaking space
        '/&(quot|rdquo|ldquo|#8220|#8221|#147|#148);/i',
		                                         // Double quotes
        '/&(apos|rsquo|lsquo|#8216|#8217);/i',   // Single quotes
        '/&gt;/i',                               // Greater-than
        '/&lt;/i',                               // Less-than
        '/&(amp|#38);/i',                        // Ampersand
        '/&(copy|#169);/i',                      // Copyright
        '/&(trade|#8482|#153);/i',               // Trademark
        '/&(reg|#174);/i',                       // Registered
        '/&(mdash|#151|#8212);/i',               // mdash
        '/&(ndash|minus|#8211|#8722);/i',        // ndash
        '/&(bull|#149|#8226);/i',                // Bullet
        '/&(pound|#163);/i',                     // Pound sign
        '/&(euro|#8364);/i',                     // Euro sign
        '/&[^&;]+;/i',                           // Unknown/unhandled entities
        '/[ ]{2,}/'                              // Runs of spaces, post-handling
    );

    var $replace = array(
        '',                                     // Non-legal carriage return
        ' ',                                    // Newlines and tabs
        ' ',                                    // Runs of spaces, pre-handling
        '',                                     // <script>s -- which strip_tags supposedly has problems with
        '',                                     // <style>s -- which strip_tags supposedly has problems with
        //'',                                     // Comments -- which strip_tags might have problem a with
        "strtoupper(\"\n\n\\1\n\n\")",          // H1 - H3
        "ucwords(\"\n\n\\1\n\n\")",             // H4 - H6
        "\n\n",                               // <p>
        "\n",                                   // <br>
        'strtoupper("\\1")',                    // <b>
        'strtoupper("\\1")',                    // <strong>
        '_\\1_',                                // <i>
        '_\\1_',                                // <em>
        "\n\n",                                 // <ul> and </ul>
        "\n\n",                                 // <ol> and </ol>
        "* \\1\n",                            // <li> and </li>
        "\n* ",                               // <li>
        '$this->_build_link_list("\\1", "\\2")',
                                                // <a href="">
        "\n-------------------------\n",        // <hr>
        "\n\n",                                 // <table> and </table>
        "\n",                                   // <tr> and </tr>
        "\t\t\\1\n",                            // <td> and </td>
        "strtoupper(\"\t\t\\1\n\")",            // <th> and </th>
        ' ',                                    // Non-breaking space
        '"',                                    // Double quotes
        "'",                                    // Single quotes
        '>',
        '<',
        '&',
        '(c)',
        '(tm)',
        '(R)',
        '--',
        '-',
        '*',
        '£',
        'EUR',                                  // Euro sign. Ä ?
        '',                                     // Unknown/unhandled entities
        ' '                                     // Runs of spaces, post-handling
    );
    
    /** ----------------------------------------
    /**  HTML to Text
    /** ----------------------------------------*/

    function Html_to_text_email($str = '')
    {
		$this->EE =& get_instance(); 

		$width = ( ! $this->EE->TMPL->fetch_param('width')) ? $this->width : $this->EE->TMPL->fetch_param('width');
  
		$html = ($str == '') ? $this->EE->TMPL->tagdata : $str;
		
		$html = str_replace('&#47;', '/',$html);
		$html = str_replace('&lt;','<',$html);
		$html = str_replace('&gt;','>',$html);
		
		// Run our defined search-and-replace
        $text = preg_replace($this->search, $this->replace, $html);
		
		// Strip any other HTML tags
        $text = strip_tags($text);

        // Bring down number of empty lines to 2 max
        $text = preg_replace("/\n\s+\n/", "\n\n", $text);
        $text = preg_replace("/[\n]{3,}/", "\n\n", $text);

        // Add link list
        if ( ! empty($this->_link_list) ) {
            $text .= "\n\nLinks:\n------\n" . $this->_link_list;
        }

		// Wrap the text to a readable format
        if ( $width > 0 ) {
        	$text = wordwrap($text, $width);
        }
		
		$this->return_data = $text;
    }
    /* END */

    function _build_link_list( $link, $display )
    {
		if ( substr($link, 0, 7) == 'http://' || substr($link, 0, 8) == 'https://' ||
             substr($link, 0, 7) == 'mailto:' ) {
            $this->_link_count++;
            $this->_link_list .= "[" . $this->_link_count . "] $link\n";
            $additional = ' [' . $this->_link_count . ']';
		} elseif ( substr($link, 0, 11) == 'javascript:' ) {
			$additional = '';
        } else {
            $this->_link_count++;
            $this->_link_list .= "[" . $this->_link_count . "] " . $this->url;
            if ( substr($link, 0, 1) != '/' ) {
                $this->_link_list .= '/';
            }
            $this->_link_list .= "$link\n";
            $additional = ' [' . $this->_link_count . ']';
        }

        return $display . $additional;
    }
    
// ----------------------------------------
//  Plugin Usage
// ----------------------------------------

// This function describes how the plugin is used.
//  Make sure and use output buffering

function usage()
{
ob_start(); 
?>
Wrap anything you want to be processed between the tag pairs.

{exp:html_to_text_email width="70"}

html you want processed

{/exp:html_to_text_email}

The "width" parameter lets you specify the number of characters to have on a line, which is very important for text based emails. If you do not 
specify the parameter, the default of 65 will be used.

Note: This tag will always leave entire words intact so you may get a few less characters than what you specify.  

<?php
$buffer = ob_get_contents();
	
ob_end_clean(); 

return $buffer;
}
/* END */


}
// END CLASS
?>