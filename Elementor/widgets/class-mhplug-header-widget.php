<?php
class MHPlug_Header_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'mhplug-advance-heading';
    }

    public function get_title() {
        return __( 'Advance Heading', 'mhplug' );
    }

    public function get_icon() {
        return 'eicon-site-title';
    }

    public function get_categories() {
        return [ 'mhplug-category' ];
    }

    protected function _register_controls() {
        // Content Section
        $this->start_controls_section(
            'mh_heading_section',
            [
                'label' => __( 'Heading', 'mhplug' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'button_show',
            [
                'label' => __( 'Need Button', 'mhplug' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'mhplug' ),
                'label_off' => __( 'No', 'mhplug' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        // Text Field
        $this->add_control(
            'mh_advance_heading',
            [
                'label' => __( 'Heading', 'mhplug' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => __( 'Enter your text here', 'mhplug' ),
            ]
            );
    
        
        // HTML Tag Select Control
    $this->add_control(
        'heading_html_tag',
        [
            'label' => __( 'HTML Tag', 'mhplug' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'p' => 'P',
                'div' => 'DIV',
            ],
            'default' => 'h2',
            'description' => __( 'Select the HTML tag for Heading.', 'mhplug' ),
        ]
    );

    $this->add_responsive_control(
        'heading_alignment',
        [
            'label' => __( 'Alignment', 'mhplug' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'mhplug' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'mhplug' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'mhplug' ),
                    'icon' => 'eicon-text-align-right',
                ],
                'justify' => [
                    'title' => __( 'Justify', 'mhplug' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'default' => 'left',
            'selectors' => [
                '{{WRAPPER}} .mhplug-heading-element' => 'text-align: {{VALUE}};',
            ],
        ]
    );
    

        $this->end_controls_section();
        
        $this->start_controls_section(
            'mh_description_section',
            [
                'label' => __('Description', 'mhplug'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        // Text Field
        $this->add_control(
            'mh_advance_desc',
            [
                'label' => __( 'Description', 'mhplug' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'placeholder' => __( 'Enter your text here', 'mhplug' ),
            ]
        );
        $this->add_control(
            'desc_html_tag',
            [
                'label' => __( 'HTML Tag', 'mhplug' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'p' => 'P',
                    'div' => 'DIV',
                ],
                'default' => 'p',
                'description' => __( 'Select the HTML tag for Description.', 'mhplug' ),
            ]
        );
    
        $this->add_responsive_control(
            'desc_alignment',
            [
                'label' => __( 'Alignment', 'mhplug' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'mhplug' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'mhplug' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'mhplug' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __( 'Justify', 'mhplug' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .mhplug-desc-element' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        
        $this->end_controls_section();
    // Style Section
    $this->start_controls_section(
        'Heading_section', // Unique identifier for the styling controls section
        [
            'label' => __( 'Heading Style', 'mhplug' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE, // This line ensures the section will be under the "Style" tab
        ]
    );

    // Color control for the style section

        // Choose Control
        $this->add_control(
            'color_selector',
            [
                'label' => __('Choose Color Type', 'text-domain'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'classic' => [
                        'title' => __('Classic', 'text-domain'),
                        'icon' => 'eicon-paint-brush',
                    ],
                    'gradient' => [
                        'title' => __('Gradient', 'text-domain'),
                        'icon' => 'eicon-barcode',
                    ],
                ],
                'default' => 'classic',
            ]
        );
    
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .mhplug-heading-element' => 'color: {{VALUE}}',
				],
                'condition' => [
                    'color_selector' => 'classic',
                ],
			]
		);
    
        // Additional controls for Popover 1...
        // Popover Toggle Control 2 (shown if Option 2 is chosen)
        $this->add_control(
            'gradient_heading_color',
            [
                'label' => __('Gradient Text Color', 'text-domain'),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'condition' => [
                    'color_selector' => 'gradient',
                ],
            ]
        );
    
        // Additional controls for Popover 2...
        $this->start_popover();
        $this->add_control(
			'gradient_first_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        $this->add_control(
			'gradient_first_location',
			[
				'label' => esc_html__( 'Location', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%', 'custom' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 0,
				],
			]
		);
        $this->add_control(
			'gradient_second_color',
			[
				'label' => esc_html__( 'Second Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
        
        $this->add_control(
			'gradient_second_location',
			[
				'label' => esc_html__( 'Location', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['%', 'custom' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
			]
		);
        
        $this->add_control(
			'gradient_angle',
			[
				'label' => esc_html__( 'Angle', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['deg', 'custom' ],
				'range' => [
					'deg' => [
						'min' => 0,
						'max' => 360,
					],
				],
				'default' => [
					'unit' => 'deg',
					'size' => 110,
				],
			]
		);
        $this->end_popover();
            
    // Typography control for your element
    $this->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'content_typography', // Unique name for the typography control
            'label' => __( 'Content Typography', 'mhplug' ),
            'selector' => '{{WRAPPER}} .mhplug-heading-element', // Replace .your-element-selector with your actual element's CSS selector
        ]
    );

    // Text Stroke Size
   

    $this->add_group_control(
        \Elementor\Group_Control_Text_Stroke::get_type(),
        [
            'name' => 'text_stroke',
            'label' => __( 'Text Stroke', 'mhplug' ),
            'selector' => '{{WRAPPER}} .mhplug-heading-element',
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Text_Shadow::get_type(),
        [
            'name' => 'text_shadow',
            'label' => __( 'Text Shadow', 'mhplug' ),
            'selector' => '{{WRAPPER}} .mhplug-heading-element',
        ]
    );
    
    // Padding Control
    $this->add_responsive_control(
        'padding',
        [
            'label' => __( 'Padding', 'mhplug' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px', // You can set the default unit you prefer (px, %, em, etc.)
                'isLinked' => false,
            ],

            'selectors' => [
                '{{WRAPPER}} .mhplug-heading-element' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};', // Adjust the selector to target your widget's elements
            ],
        ]
    );
    // Padding Control
    $this->add_responsive_control(
        'margin',
        [
            'label' => __( 'Margin', 'mhplug' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'default' => [
                'top' => '20',
                'right' => '20',
                'bottom' => '20',
                'left' => '20',
                'unit' => 'px', // You can set the default unit you prefer (px, %, em, etc.)
                'isLinked' => false,
            ],
            'selectors' => [
                '{{WRAPPER}} .mhplug-heading-element' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};', // Adjust the selector to target your widget's elements
            ],
        ]
    );

        
    $this->end_controls_section();
// Style Section
$this->start_controls_section(
    'desc_section', // Unique identifier for the styling controls section
    [
        'label' => __( 'Description Style', 'mhplug' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE, // This line ensures the section will be under the "Style" tab
    ]
);

// Color control for the style section
$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name'  => 'desc_color',
        'label' => __( 'Text Color', 'plugin-domain' ),
        'type' => [ 'classic', 'gradient'],
        'selectors' => '{{WRAPPER}} .mhplug-desc-element',
    ]
);
// Typography control for your element
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'desc_content_typography', // Unique name for the typography control
        'label' => __( 'Content Typography', 'mhplug' ),
        'selector' => '{{WRAPPER}} .mhplug-desc-element', // Replace .your-element-selector with your actual element's CSS selector
    ]
);

// Text Stroke Size


$this->add_group_control(
    \Elementor\Group_Control_Text_Stroke::get_type(),
    [
        'name' => 'desc_stroke',
        'label' => __( 'Text Stroke', 'mhplug' ),
        'selector' => '{{WRAPPER}} .mhplug-desc-element',
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Text_Shadow::get_type(),
    [
        'name' => 'desc_shadow',
        'label' => __( 'Text Shadow', 'mhplug' ),
        'selector' => '{{WRAPPER}} .mhplug-desc-element',
    ]
);

// Padding Control
$this->add_responsive_control(
    'desc_padding',
    [
        'label' => __( 'Padding', 'mhplug' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'default' => [
            'top' => '20',
            'right' => '20',
            'bottom' => '20',
            'left' => '20',
            'unit' => 'px', // You can set the default unit you prefer (px, %, em, etc.)
            'isLinked' => false,
        ],

        'selectors' => [
            '{{WRAPPER}} .mhplug-desc-element' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};', // Adjust the selector to target your widget's elements
        ],
    ]
);
// Padding Control
$this->add_responsive_control(
    'desc_margin',
    [
        'label' => __( 'Margin', 'mhplug' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%', 'em' ],
        'default' => [
            'top' => '20',
            'right' => '20',
            'bottom' => '20',
            'left' => '20',
            'unit' => 'px', // You can set the default unit you prefer (px, %, em, etc.)
            'isLinked' => false,
        ],
        'selectors' => [
            '{{WRAPPER}} .mhplug-desc-element' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};', // Adjust the selector to target your widget's elements
        ],
    ]
);


$this->end_controls_section();
    $this->start_controls_section(
        'button_section',
        [
            'label' => __( 'BUtton', 'mhplug' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'button_show' => 'yes', // Show this control only if 'toggle_control' is set to 'yes'
            ],
        ]
    );
 // Add Switcher control for the display condition

    $this->add_control(
        'button_text',
        [
            'label' => __( 'Button Text', 'mhplug' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __( 'Click Here', 'mhplug' ),
            'placeholder' => __( 'Enter button text here', 'mhplug' ),
        ]
    );

    $this->add_control(
        'button_url',
        [
            'label' => __( 'Button URL', 'mhplug' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'mhplug' ),
            'default' => [
                'url' => '',
                'is_external' => false,
                'nofollow' => false,
            ],
        ]
    );

    $this->add_control(
        'button_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
    );

    $this->add_responsive_control(
        'button_alignment',
        [
            'label' => __( 'Alignment', 'mhplug' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __( 'Left', 'mhplug' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __( 'Center', 'mhplug' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => __( 'Right', 'mhplug' ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'center',

            'selectors' => [
                '{{WRAPPER}} .your-button-class' => 'text-align: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

// Start Style Section for Button
$this->start_controls_section(
    'style_button',
    [
        'label' => __( 'Button', 'plugin-domain' ),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        'condition' => [
            'button_show' => 'yes',
        ],
    ]
);

// Button Typography
$this->add_group_control(
    \Elementor\Group_Control_Typography::get_type(),
    [
        'name' => 'button_typography',
        'selector' => '{{WRAPPER}} .your-button-class',
    ]
);

// Button Text Color
$this->add_control(
    'button_text_color',
    [
        'label' => __( 'Text Color', 'plugin-domain' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .your-button-class' => 'color: {{VALUE}};',
        ],
    ]
);

// Button Background Color
$this->add_group_control(
    \Elementor\Group_Control_Background::get_type(),
    [
        'name'  => 'button_background_color',
        'label' => __( 'Background Color', 'plugin-domain' ),
        'type' => [ 'classic', 'gradient'],
        'selectors' => '{{WRAPPER}} .your-button-class',
    ]
);
$this->add_group_control(
    \Elementor\Group_Control_Border::get_type(),
    [
        'name' => 'button_border',
        'selector' => '{{WRAPPER}} .your-class',
    ]
);
// Other style controls (hover color, padding, shadow, etc.) go here...

$this->end_controls_section();

    $this->start_controls_section(
        'mh_display_condition',
        [
            'label' => __( 'Display Condition', 'mhplug' ),
            'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
        ]
    );

    // Add Switcher control for the display condition
    $this->add_control(
        'show_widget',
        [
            'label' => __( 'Show Widget', 'mhplug' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'Show', 'mhplug' ),
            'label_off' => __( 'Hide', 'mhplug' ),
            'return_value' => 'yes',
            'default' => 'no',
        ]
    );
    
      // Get categories to populate the select control
      $categories = get_categories(array(
        'hide_empty' => false,
    ));
    $category_options = [];
    foreach ($categories as $category) {
        $category_options[$category->term_id] = $category->name;
    

    $this->add_control(
        'selected_categories',
        [
            'label' => __('Select Categories', 'mhplug'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => $category_options,
            'default' => [],
            'condition' => [
                'show_widget' => 'yes', // Show this control only if 'toggle_control' is set to 'yes'
            ],
            'description' => __('Select categories to conditionally display this widget.', 'mhplug'),
        ]
    );
}

// Widget rendering code goes here

    $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        // Check the switcher state
    if ('yes' === $settings['show_widget']) {
        $selected_categories = $settings['selected_categories'];
    
        // Check if we're viewing a single post and it has one of the selected categories
        if (is_single() && !empty($selected_categories)) {
            $post_categories = wp_get_post_categories(get_the_ID());
            $display_widget = false;
    
            foreach ($post_categories as $post_category) {
                if (in_array($post_category, $selected_categories)) {
                    $display_widget = true;
                    
                    break; // Exit the loop as we found a matching category
                }
            }
    
            if (!$display_widget) {
                $headingtag = !empty($settings['heading_html_tag']) ? $settings['heading_html_tag'] : 'div'; // Fallback to 'div' if for some reason the setting is empty
            
                echo '<' . esc_attr($headingtag) . ' class="mhplug-heading-element">' . esc_html( $settings['mh_advance_heading'] ) . '</' . esc_attr($headingtag) . '>';
            // Don't render the widget
                $desctag = !empty($settings['desc_html_tag']) ? $settings['desc_html_tag'] : 'div'; // Fallback to 'div' if for some reason the setting is empty
            
                echo '<' . esc_attr($desctag) . ' class="mhplug-desc-element">' . esc_html( $settings['mh_advance_desc'] ) . '</' . esc_attr($desctag) . '>';
            // Don't render the widget
            }
        }
    }else {
        $headingtag = !empty($settings['heading_html_tag']) ? $settings['heading_html_tag'] : 'div'; // Fallback to 'div' if for some reason the setting is empty
        if ('classic' === $settings['color_selector']) {
            $headinggradient = "color: ".$settings['text_color'].";";
        }else if ('gradient' === $settings['color_selector']) {
        $headinggradient .= "background: linear-gradient(".$settings['gradient_angle']['size']."deg, ".$settings['gradient_first_color']." ".$settings['gradient_first_location']['size']."%, ".$settings['gradient_second_color']." ".$settings['gradient_second_location']['size']."%);";
        $headinggradient .= "-webkit-background-clip: text;";
        $headinggradient .= "color: transparent;";
        $headinggradient .= "display: inline-block;";
        }

        
        echo '<' . esc_attr($headingtag) . ' class="mhplug-heading-element" style="'. esc_attr($headinggradient).'">' . esc_html( $settings['mh_advance_heading'] ) . '</' . esc_attr($headingtag) . '>';
        
        $desctag = !empty($settings['desc_html_tag']) ? $settings['desc_html_tag'] : 'div'; // Fallback to 'div' if for some reason the setting is empty
            
        echo '<' . esc_attr($desctag) . ' class="mhplug-desc-element">' . esc_html( $settings['mh_advance_desc'] ) . '</' . esc_attr($desctag) . '>';
    // Don't render the widget
    }
        // Normal widget rendering code goes here
    }
    
 
    
    
}
