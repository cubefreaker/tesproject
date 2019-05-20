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

	if( !function_exists('select_provinsi') ) {

		function select_provinsi ($name, $selected = FALSE, $html_attr = '', $add_options = array("" => " -- Choose --")) {
	        $ci = & get_instance();

	        $ci->load->helper('form');
	        $ci->load->model('Global_model');

	        $datas = $ci->Global_model->set_model("mst_province", "md", "id")->mode (array(
	            "select" => "id, name",
	            "status" => -1 
	        ));

	        if (!$datas) :
	            return FALSE;
	        endif;

	        $datas = array_column($datas,"id", "name");

	        return form_dropdown($name, $add_options + $datas, $selected, $html_attr);
	    }
	}

	if ( ! function_exists('form_dropdown'))
	{
		/**
		 * Drop-down Menu
		 *
		 * @param	mixed	$data
		 * @param	mixed	$options
		 * @param	mixed	$selected
		 * @param	mixed	$extra
		 * @return	string
		 */
		function form_dropdown($data = '', $options = array(), $selected = array(), $extra = '')
		{
			$defaults = array();

			if (is_array($data))
			{
				if (isset($data['selected']))
				{
					$selected = $data['selected'];
					unset($data['selected']); // select tags don't have a selected attribute
				}

				if (isset($data['options']))
				{
					$options = $data['options'];
					unset($data['options']); // select tags don't use an options attribute
				}
			}
			else
			{
				$defaults = array('name' => $data);
			}

			is_array($selected) OR $selected = array($selected);
			is_array($options) OR $options = array($options);

			// If no selected state was submitted we will attempt to set it automatically
			if (empty($selected))
			{
				if (is_array($data))
				{
					if (isset($data['name'], $_POST[$data['name']]))
					{
						$selected = array($_POST[$data['name']]);
					}
				}
				elseif (isset($_POST[$data]))
				{
					$selected = array($_POST[$data]);
				}
			}

			$extra = _attributes_to_string($extra);

			$multiple = (count($selected) > 1 && stripos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

			$form = '<select '.rtrim(_parse_form_attributes($data, $defaults)).$extra.$multiple.">\n";

			foreach ($options as $key => $val)
			{
				$key = (string) $key;

				if (is_array($val))
				{
					if (empty($val))
					{
						continue;
					}

					$form .= '<optgroup label="'.$key."\">\n";

					foreach ($val as $optgroup_key => $optgroup_val)
					{
						$sel = in_array($optgroup_key, $selected) ? ' selected="selected"' : '';
						$form .= '<option value="'.html_escape($optgroup_key).'"'.$sel.'>'
							.(string) $optgroup_val."</option>\n";
					}

					$form .= "</optgroup>\n";
				}
				else
				{
					$form .= '<option value="'.html_escape($key).'"'
						.(in_array($key, $selected) ? ' selected="selected"' : '').'>'
						.(string) $val."</option>\n";
				}
			}

			return $form."</select>\n";
		}
	}
	function options($src, $id, $ref_val, $text_field)
	{
		$options = '';
		foreach ($src->result() as $row) {
			$opt_value	= $row->$id;
			$text_value	= $row->$text_field;
			
			if ($row->$id == $ref_val) {
				$options .= '<option value="'.$opt_value.'" selected>'.$text_value.'</option>';
			}
			else {
				$options .= '<option value="'.$opt_value.'">'.$text_value.'</option>';
			}
		}
		return $options;
	}


?>