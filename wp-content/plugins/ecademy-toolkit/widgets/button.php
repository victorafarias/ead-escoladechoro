<?php
/**
 * Button Widget
 */

namespace Elementor;
class eCademy_Button extends Widget_Base {

	public function get_name() {
        return 'eCademyButton';
    }

	public function get_title() {
        return __( 'eCademy Button', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-handle';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Button',
			[
				'label' => __( 'eCademy Button', 'ecademy-toolkit' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'button_text',
                [
                    'label'   => __( 'Button Text', 'ecademy-toolkit' ),
                    'type'  => Controls_Manager::TEXT,
                    'default' => __('Get In Touch', 'ecademy-toolkit'),
					'dynamic' => [
						'active' => true,
					],
                ]
            );

            $this->add_control(
                'button_link',
                [
                    'label'   => __( 'Button Link', 'ecademy-toolkit' ),
                    'type'  => Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
                ]
            );

            $this->add_control(
                'button_alignment',
                [
                    'label'   => __( 'Button Alignment', 'ecademy-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        'text-start'                => __( 'Left', 'ecademy-toolkit' ),
                        'text-center'              => __( 'Center', 'ecademy-toolkit' ),
                        'text-end'               => __( 'Right', 'ecademy-toolkit' ),
                    ],
                    'default' => 'text-start',
                ]
            );

            $this->add_control(
                'icon_option',
                [
                    'label'   => __( 'Button Icon Option', 'ecademy-toolkit' ),
                    'type'  => Controls_Manager::SELECT,
                    'options' => [
                        'button-svg-icon'                => __( 'SVG Icon', 'ecademy-toolkit' ),
                        'button-l-icon'              => __( 'Icon Library', 'ecademy-toolkit' ),
                        'button-no-icon'              => __( 'No Icon', 'ecademy-toolkit' ),
                    ],
                    'default' => 'button-svg-icon',
                ]
            );

            $this->add_control(
                'button_s_icon', [
					'type'  => Controls_Manager::MEDIA,
					'label'   => esc_html__( 'Button SVG Icon', 'ecademy-toolkit' ),
                    'condition' => [
                        'icon_option' => 'button-svg-icon',
                    ]
                ]
            );

            $this->add_control(
                'button_icon', [
                    'label'   => __( 'Button Icon', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::ICONS,
                    'label_block' => true,
                    'condition' => [
                        'icon_option' => 'button-l-icon',
                    ]
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'Button_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
				'btn_text_color',
				[
					'label'     => __( 'Button Text Color', 'ecademy-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .default-btn' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'heading',
				[
					'label'     => __( 'Button Background Color', 'ecademy-toolkit' ),
					'type'      => Controls_Manager::HEADING,
				]
			);

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Button Background Color', 'ecademy-toolkit' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .default-btn',
                ]
            );

            $this->add_control(
				'h_heading',
				[
					'label'     => __( 'Button Hover Background Color', 'ecademy-toolkit' ),
					'type'      => Controls_Manager::HEADING,
				]
			);

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'h_background',
                    'label' => __( 'Button Hover Background Color', 'ecademy-toolkit' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .default-btn span',
                ]
            );

            $this->add_control(
				'btn_hover_text_color',
				[
					'label'     => __( 'Button Hover Text Color', 'ecademy-toolkit' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .default-btn:hover' => 'color: {{VALUE}}',
					],
				]
			);

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography',
                    'label'    => __( 'Button Typography', 'ecademy-toolkit' ),
                    'selector' => '{{WRAPPER}} .default-btn',
                ]
            );
		
		     $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name'     => 'btn_typography_icon',
                    'label'    => __( 'Button Icon Typography', 'ecademy-toolkit' ),
                    'selector' => '{{WRAPPER}} .default-btn i, {{WRAPPER}} .default-btn svg',
                ]
            );

            $this->add_group_control(
               Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'selector' => '{{WRAPPER}} .default-btn',
                ]
            );

            $this->add_responsive_control(
                'border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'text_padding',
                [
                    'label' => esc_html__( 'Button Padding', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .default-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'icon_position',
                [
                    'label' => esc_html__( 'Button Icon Position', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .default-btn i, .default-btn svg' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom:{{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button_link', $settings['button_link'] );
		}
        $button_no_icon = '';
        if ($settings['icon_option'] == 'button-no-icon'):
            $button_no_icon = 'btn-no-icon';
        endif;
        ?>
        <div class="sa-button-title <?php echo esc_attr($settings['button_alignment']); ?>">
            <?php if( $settings['button_text'] ): ?>
                <a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> class="default-btn <?php echo esc_attr($button_no_icon); ?>">
                    <?php if ($settings['icon_option'] == 'button-svg-icon'): ?> 
                        <?php if($settings['button_s_icon']['url']): ?>
                            <img class='icon-img' src="<?php echo esc_url($settings['button_s_icon']['url']); ?>" alt="icon"/>
                        <?php endif; ?> 
                    <?php elseif ($settings['icon_option'] == 'button-l-icon'): ?> 
                        <?php if($settings['button_icon']): ?> 
                           <?php Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        <?php endif; ?>  
                    <?php endif; ?>
                    <?php echo esc_html( $settings['button_text'] ); ?>
                    <span></span>
                </a>
            <?php endif; ?>
        </div>

        <?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new eCademy_Button );