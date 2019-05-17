<?php 
	// ------------------------------------------------------------------------
	if ( ! function_exists('print_query') )
	{
	    /**
	     * PRINT_R HELPER FUNCTION TO PRINT QUERY BEFORE EXECUTING.
	     * PASS $THIS->DB to the PARAM.
	     * debug query
	     */
	    function print_query($db) {
	        echo "<pre>";print_r($db->get_compiled_select());echo "</pre>";
	    }
	}

	if(! function_exists('auto_format_paragraph') ) 
	{
		/**
		 * referensi https://stackoverflow.com/questions/7409512/new-line-to-paragraph-function
		 * @param  [type]  $string      [description]
		 * @param  boolean $line_breaks [description]
		 * @param  boolean $xml         [description]
		 * @return [type]               [description]
		 */
		function auto_format_paragraph($string, $line_breaks = true, $xml = true) {

			$string = str_replace(array('<p>', '</p>'), '', $string);

			// It is conceivable that people might still want single line-breaks
			// without breaking into a new paragraph.
			if ($line_breaks == true)
			    return '<p>'.preg_replace(array("/([\n]{2,})/i", "/([^>])\n([^<])/i"), array("</p>\n<p>", '$1<br'.($xml == true ? ' /' : '').'>$2'), trim($string)).'</p>';
			else 
			    return '<p>'.preg_replace(
			    array("/([\n]{2,})/i", "/([\r\n]{3,})/i","/([^>])\n([^<])/i"),
			    array("</p>\n<p>", "</p>\n<p>", '$1<br'.($xml == true ? ' /' : '').'>$2'),

			    trim($string)).'</p>'; 
		}
	}

?>