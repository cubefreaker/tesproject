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

?>