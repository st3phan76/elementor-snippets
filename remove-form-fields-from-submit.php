<?php

/**
 * Name: remove form fields from submit
 * Author: st3phan76 (https://github.com/st3phan76)
 * License: GPL 2 or later
 *
 * Avoid sending fields/data like html, step or others by elementor form widget
 * Requires plugin Elementor PRO.
 * Use the action and filters and place them in your child-theme's functions.php file or your custom plugin file.
 */
 
add_action('elementor_pro/forms/validation', function ($record, $ajax_handler) {
    $fields = $record->get('fields');

    foreach ($fields as $key => $field) {
        
		// avoid sending html and step fields filtered by field type
		if (isset($field['type']) && in_array($field['type'], ['html', 'step'])) {
            unset($fields[$key]);
        }
    }

    // set up fields
    $record->set('fields', $fields);
}, 10, 2);