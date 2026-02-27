<?php
/**
 * Remove Form Fields from Submit
 *
 * Avoid sending fields/data like 'html', 'step' or others in Elementor Form widget submissions.
 * Requires: Elementor PRO.
 *
 * Usage:
 * Place the action and filters in your child theme's functions.php file or in a custom plugin file.
 *
 * @package    ElementorSnippets
 * @author     st3phan76
 * @copyright  2026 st3phan76
 * @license    GPL-2.0-or-later
 * @link       https://github.com/st3phan76
 * @version    1.0.0
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