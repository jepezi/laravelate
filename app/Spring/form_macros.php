<?php

Form::macro ( 'textField', function ($name, $value = null, $attributes = array(), $label = null ) {
	$element = Form::text ( $name, Input::old( $name , $value), fieldAttributes ( $name, $attributes ) );
	
	return fieldWrapper ( $name, $element, $label );
} );

Form::macro ( 'emailField', function ($name, $value = null, $attributes = array(), $label = null ) {
	$element = Form::email ( $name, Input::old( $name , $value), fieldAttributes ( $name, $attributes ) );
	
	return fieldWrapper ( $name, $element, $label );
} );

Form::macro ( 'passwordField', function ($name, $attributes = array(), $label = null ) {
	$element = Form::password ( $name, fieldAttributes ( $name, $attributes ) );
	
	return fieldWrapper ( $name, $element, $label );
} );

Form::macro ( 'imageUpload', function ($path, $url, $label, $input, $help) {
	$wrapper = '<div class="form-item">';
	$wrapper .= '<img src="' . $path . '" id="imageUpload" alt="">';
	$wrapper .= '<span class="btn btn--full fileinput-button">';
	$wrapper .= '<span>' . $label . '</span>';
	$wrapper .= '<input id="fileupload" type="file" name="file" data-url="' . $url . '" data-input="#' . $input . '">';
	$wrapper .= '</span>';
	$wrapper .= '<small class="help">' . $help . '</small>';
	$wrapper .= '<div id="fileuploadprogress" class="progress">';
	$wrapper .= '<div class="progress-bar progress-bar-success"></div>';
	$wrapper .= '</div>';
	$wrapper .= '<div id="error-upload" class="error"></div>';
	$wrapper .= '<div id="files" class="files"></div>';
	$wrapper .= '<input type="hidden" name="' . $input . '" id="' . $input . '" value="' . $path . '">';
	$wrapper .= '</div>';

	return $wrapper;
} );

if (! function_exists ( 'fieldWrapper' )) {
	function fieldWrapper($field, $element, $label = null) {
		$out = '<div class="form-item';
		$out .= fieldError ( $field ) . '">'; // set error class
		$out .= fieldLabel ( $field, $label ); // gen label
		$out .= $element;
		$out .= errorMessage ( $field ); // display error message
		$out .= '</div>';
		
		return $out;
	}
}

if (! function_exists ( 'errorMessage' )) {
	function errorMessage($field) {
		if ($errors = Session::get ( 'errors' )) {
			return '<span class="label label-danger">' . $errors->first ( $field ) . '</span>';
		}
	}
}

if (! function_exists ( 'fieldError' )) {
	function fieldError($field) {
		$error = '';
		if ($errors = Session::get ( 'errors' )) {
			$error = $errors->first ( $field ) ? ' has-error' : '';
		}
		return $error;
	}
}

if (! function_exists ( 'fieldLabel' )) {
	function fieldLabel($name, $label) {
		$out = '<label for="' . $name . '">';
		if ($label === null) {
			// remove _id, [].. replace _ and - with space.
			$out .= ucfirst ( str_replace ( array (
					'_',
					'-' 
			), ' ', str_replace ( array (
					'_id',
					'[]' 
			), '', $name ) ) );
		} else {
			$out .= $label;
		}
		$out .= '</label>';
		return $out;
	}
}

if (! function_exists ( 'fieldAttributes' )) {
	function fieldAttributes($name, $attributes = array()) {
		return array_merge ( [
				
				], $attributes );
	}
}