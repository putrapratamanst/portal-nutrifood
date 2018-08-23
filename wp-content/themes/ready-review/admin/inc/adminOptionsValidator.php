<?php

class ready_reviewOptionsValidator {
    public function __construct() {
        $sanitizer = new ready_reviewSanitizer();
        add_filter('ready_review_sanitize_color', array($sanitizer, 'sanitize_hex'), 10, 2);
        add_filter('ready_review_sanitize_textarea', array($sanitizer, 'sanitize_textarea'), 10, 2);
        add_filter('ready_review_sanitize_array', array($sanitizer, 'sanitize_array'), 10, 3);
        add_filter('ready_review_sanitize_enum', array($sanitizer, 'sanitize_enum'), 10, 3);
        add_filter('ready_review_sanitaze_typography', array($sanitizer, 'sanitize_typography'), 10, 2);
        add_filter('ready_review_sanitize_url', array($sanitizer, 'sanitize_imageurl'), 10, 2);
        add_filter('ready_review_sanitize_number', array($sanitizer, 'sanitize_number'), 10, 2);
        add_filter('ready_review_sanitize_background', array($sanitizer, 'sanitize_background'), 10, 2);
    }

    public function validate_defaults() {
        $ninput = array();
        $defaults = $this->get_default_options();
        foreach ($defaults as $k => $i) {
            switch ($i['type']) {
                case "textarea":
                case "editor":
                case "input_text":
                    $ninput[$k] = apply_filters("ready_review_sanitize_textarea", $i['default']);
                    break;
                case "radio":
                case "select":
                    $ninput[$k] = apply_filters("ready_review_sanitize_enum", $i['default'], $k);
                    break;
                case "color":
                    $ninput[$k] = apply_filters("ready_review_sanitize_color", $i['default']);
                    break;
                case "image":
                    $ninput[$k] = apply_filters("ready_review_sanitize_url", $i['default']);
                    break;
                case "background":
                    $ninput[$k] = apply_filters("ready_review_sanitize_background", $i['default']);
                    break;
                case "typography":
                    $ninput[$k] = apply_filters("ready_review_sanitize_typography", $i['default']);
                    break;
                case "input_number":
                    $ninput[$k] = apply_filters("ready_review_sanitize_number", $i['default']);
                    break;
                case "checkbox":
                case "multiselect":
                    $ninput[$k] = apply_filters("ready_review_sanitize_array", $i['default'], $k);
                    break;
            }
        }
        return $ninput;
    }

    public function get_default_options() {
        $structure = ready_reviewConfig::$structure;
        $options = ready_review_get_config_defaults($structure);
        $data = array();
        foreach ($structure as $k => $fields) {
            if ($fields['type'] == 'tab') {
                foreach ($fields['options'] as $r => $field) {
                    if ($field['type'] == 'group') {
                        foreach ($field['options'] as $m => $gfield) {
                            if ($gfield["type"] != 'title')
                                $data[$gfield['id']] = array(
                                        "default" => $options[$gfield['id']],
                                        "type" => $gfield['type']
                                );
                        }
                    } else {
                        if ($field["type"] != 'title')
                            $data[$field['id']] = array(
                                    "default" => $options[$field['id']],
                                    "type" => $field['type']
                            );
                    }
                }
            }
        }
        return $data;
    }

    public function validate($input) {
        $ninput = array();
        $options = $this->get_options_data($options);
        foreach ($input as $k => $i) {
            switch ($options[$k]['type']) {
                case "textarea":
                case "editor":
                case "input_text":
                    $ninput[$k] = apply_filters("ready_review_sanitaze_textarea", $i, $options[$k]['default']);
                    break;
                case "radio":
                case "select":
                    $ninput[$k] = apply_filters("ready_review_sanitize_enum", $i, $k, $options[$k]['default']);
                    break;
                case "color":
                    $ninput[$k] = apply_filters("ready_review_sanitaze_color", $i, $options[$k]['default']);
                    break;
                case "image":
                    $ninput[$k] = apply_filters("ready_review_sanitaze_url", $i, $options[$k]['default']);
                    break;
                case "background":
                    $ninput[$k] = apply_filters("ready_review_sanitaze_background", $i, $options[$k]['default']);
                    break;
                case "typography":
                    $ninput[$k] = apply_filters("ready_review_sanitaze_typography", $i, $options[$k]['default']);
                    break;
                case "input_number":
                    $ninput[$k] = apply_filters("ready_review_sanitaze_number", $i, $options[$k]['default']);
                    break;
                case "checkbox":
                case "multiselect":
                    $ninput[$k] = apply_filters("ready_review_sanitize_array", $i, $k, $options[$k]['default']);
                    break;
            }
        }
        return $ninput;
    }

    public function get_options_data($options = 0) {
        $structure = ready_reviewConfig::$structure;
        $defaults = ready_review_get_config_defaults($structure);
        $option = get_option(ready_review_config("menu_slug"));
        $options = array_merge($defaults, is_array($option) ? $option : array());
        $data = array();
        foreach ($structure as $k => $fields) {
            if ($fields['type'] == 'tab') {
                foreach ($fields['options'] as $r => $field) {
                    if ($field['type'] == 'group') {
                        foreach ($field['options'] as $m => $gfield) {
                            if ($gfield["type"] != 'title')
                                $data[$gfield['id']] = array(
                                        "default" => $options[$gfield['id']],
                                        "type" => $gfield['type']
                                );
                        }
                    } else {
                        if ($field["type"] != 'title')
                            $data[$field['id']] = array(
                                    "default" => $options[$field['id']],
                                    "type" => $field['type']
                            );
                    }
                }
            }
        }
        return $data;
    }
    //adauga aici noile functii pentru submeniu daca pagina este in meniul principal
}