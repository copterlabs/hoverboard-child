<?php

/**
 * REGISTERS CUSTOM FIELDS
 * -----------------------
 *
 * For production, export all Advanced Custom Fields as PHP and put them here.
 *
 * The register_field_group function accepts 1 array which holds the relevant 
 * data to register a field group. You may edit the array as you see fit. 
 * However, this may result in errors if the array is not compatible with ACF.
 */

if (function_exists("register_field_group")) {
    if (!defined('RW2_SKIP_PRODUCT_FIELDS')) {
        register_field_group(array (
            'id' => 'acf_product-information',
            'title' => 'Product Information',
            'fields' => array (
                array (
                    'key' => 'field_522d531a51b38',
                    'label' => 'Full Description',
                    'name' => 'product_description',
                    'type' => 'wysiwyg',
                    'instructions' => 'This is the long description, displayed on the full product display page.',
                    'required' => 1,
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 'yes',
                ),
                array (
                    'key' => 'field_522d536c51b39',
                    'label' => 'Short Description',
                    'name' => 'product_excerpt',
                    'type' => 'wysiwyg',
                    'instructions' => 'This description is used for product previews. If left empty, an excerpt will be auto-generated from the full product description above.',
                    'default_value' => '',
                    'toolbar' => 'basic',
                    'media_upload' => 'no',
                ),
                array (
                    'key' => 'field_522d53c751b3a',
                    'label' => 'Product Image',
                    'name' => 'product_image',
                    'type' => 'image',
                    'instructions' => 'Upload an image of the product. It should be at least 400 pixels wide by 400 pixels tall. It will be automatically sized to fit the layout of your site.',
                    'save_format' => 'object',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ),
                array (
                    'key' => 'field_522d548551b3b',
                    'label' => 'More Info Link (optional)',
                    'name' => 'product_infolink',
                    'type' => 'text',
                    'instructions' => 'If set, this is the page to which visitors will be sent when clicking the link to learn more about the product or clicking the product title and image. Most often this link is used to direct visitors to a sales page. If this is not set, the visitor will be taken to the product\'s full page on this website.',
                    'default_value' => '',
                    'placeholder' => 'http://',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
                array (
                    'key' => 'field_522d558f51b3c',
                    'label' => 'Purchase Link',
                    'name' => 'product_purchaselink',
                    'type' => 'text',
                    'instructions' => 'This is the link to the page where a visitor can buy the product. This can be PayPal, 1ShoppingCart, ClickBank, or any other payment processor.',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => 'http://',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'product',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'acf_after_title',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                    0 => 'the_content',
                    1 => 'excerpt',
                    2 => 'custom_fields',
                    3 => 'discussion',
                    4 => 'comments',
                    5 => 'format',
                    6 => 'featured_image',
                    7 => 'send-trackbacks',
                ),
            ),
            'menu_order' => 0,
        ));
    }

    if (!defined('RW2_SKIP_SERVICE_FIELDS')) {
        register_field_group(array (
            'id' => 'acf_service-details',
            'title' => 'Service Details',
            'fields' => array (
                array (
                    'key' => 'field_5249cec616ef9',
                    'label' => 'Full Description',
                    'name' => 'service_description',
                    'type' => 'wysiwyg',
                    'instructions' => 'This is the long description, displayed on the full service display page. If you have an external sales page, this field is not used.',
                    'default_value' => '',
                    'toolbar' => 'full',
                    'media_upload' => 'no',
                ),
                array (
                    'key' => 'field_5249cff716efb',
                    'label' => 'Short Description',
                    'name' => 'service_excerpt',
                    'type' => 'wysiwyg',
                    'instructions' => 'This description is used for service previews. If left empty, an excerpt will be auto-generated from the full service description above.',
                    'default_value' => '',
                    'toolbar' => 'basic',
                    'media_upload' => 'no',
                ),
                array (
                    'key' => 'field_5249ceed16efa',
                    'label' => 'More Info Link',
                    'name' => 'service_infolink',
                    'type' => 'text',
                    'instructions' => 'If set, this is the page to which visitors will be sent when clicking the link to learn more about the service or clicking the product title and image. Most often this link is used to direct visitors to a sales page. If this is not set, the visitor will be taken to the service\'s full page on this website.',
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => 'http://',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
                array (
                    'key' => 'field_5249d03b16efc',
                    'label' => 'Service Image',
                    'name' => 'service_image',
                    'type' => 'image',
                    'instructions' => 'Upload an image for the service. It should be at least 400 pixels wide by 400 pixels tall. It will be automatically sized to fit the layout of your site.',
                    'save_format' => 'object',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ),
                array (
                    'key' => 'field_5249d0cc16efd',
                    'label' => 'Purchase Link',
                    'name' => 'service_purchaselink',
                    'type' => 'text',
                    'instructions' => 'This is the link to the page where a visitor can pay for or sign up for the service. This can be PayPal, 1ShoppingCart, ClickBank, or any other payment processor.',
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
                array (
                    'key' => 'field_5249d0cc16efe',
                    'label' => 'Purchase Link Text',
                    'name' => 'service_purchaselink_text',
                    'type' => 'text',
                    'instructions' => 'Text for the button, such as "Schedule Now" or "Apply Now".',
                    'default_value' => 'Start Now',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'service',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'acf_after_title',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                    0 => 'the_content',
                    1 => 'excerpt',
                    2 => 'custom_fields',
                    3 => 'discussion',
                    4 => 'comments',
                    5 => 'revisions',
                    6 => 'format',
                    7 => 'featured_image',
                    8 => 'categories',
                    9 => 'tags',
                ),
            ),
            'menu_order' => 0,
        ));
    }

    if (!defined('RW2_SKIP_TESTIMONIAL_FIELDS')) {
        register_field_group(array (
            'id' => 'acf_testimonial-details',
            'title' => 'Testimonial Details',
            'fields' => array (
                array (
                    'key' => 'field_526000954dafb',
                    'label' => 'Testimonial Text',
                    'name' => 'testimonial_text',
                    'type' => 'textarea',
                    'instructions' => 'The quote you want to feature.',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'maxlength' => '',
                    'formatting' => 'br',
                ),
                array (
                    'key' => 'field_526000ec4dafc',
                    'label' => 'Testimonial Attribution',
                    'name' => 'testimonial_attribution',
                    'type' => 'text',
                    'instructions' => 'The person who gave you the quote.',
                    'required' => 1,
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
                array (
                    'key' => 'field_5260013a4dafd',
                    'label' => 'Testimonial Affiliation (optional)',
                    'name' => 'testimonial_affiliation',
                    'type' => 'text',
                    'instructions' => 'Optional affiliation for this person for added credibility.',
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'formatting' => 'none',
                    'maxlength' => '',
                ),
                array (
                    'key' => 'field_5260020a497d9',
                    'label' => 'Testimonial Image (optional)',
                    'name' => 'testimonial_image',
                    'type' => 'image',
                    'save_format' => 'object',
                    'preview_size' => 'testimonial',
                    'library' => 'uploadedTo',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'testimonial',
                        'order_no' => 0,
                        'group_no' => 0,
                    ),
                ),
            ),
            'options' => array (
                'position' => 'acf_after_title',
                'layout' => 'no_box',
                'hide_on_screen' => array (
                    0 => 'the_content',
                    1 => 'excerpt',
                    2 => 'custom_fields',
                    3 => 'discussion',
                    4 => 'comments',
                    5 => 'revisions',
                    6 => 'slug',
                    7 => 'author',
                    8 => 'format',
                    9 => 'categories',
                    10 => 'tags',
                    11 => 'send-trackbacks',
                ),
            ),
            'menu_order' => 0,
        ));
    }
}
