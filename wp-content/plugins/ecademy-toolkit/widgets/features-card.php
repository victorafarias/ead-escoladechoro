<?php
/**
 * Features Cards Widget
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class eCademy_Features_Card extends Widget_Base {

	public function get_name() {
        return 'eCademy_Features_Card';
    }

	public function get_title() {
        return esc_html__( 'Feature Cards', 'ecademy-toolkit' );
    }

	public function get_icon() {
        return 'eicon-star-o';
    }

	public function get_categories() {
        return [ 'ecademy-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'eCademy_Features_Card_controls',
			[
				'label' => esc_html__( 'Features Cards Controls', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'columns',
                [
                    'label' => esc_html__( 'Choose Columns', 'ecademy-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'col-lg-12 col-sm-12'   => esc_html__( '1', 'ecademy-toolkit' ),
                        'col-lg-6 col-sm-6'   => esc_html__( '2', 'ecademy-toolkit' ),
                        'col-lg-4 col-sm-6'   => esc_html__( '3', 'ecademy-toolkit' ),
                        'col-lg-3 col-sm-6'   => esc_html__( '4', 'ecademy-toolkit' ),
                    ],
                    'default' => 'col-lg-4 col-sm-6',
                ]
            );

            $repeater = new Repeater();
            $repeater->add_control(
                'image', [
                    'label'     => esc_html__( 'Image Icon', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'     => esc_html__( 'Title', 'ecademy-toolkit' ),
                    'type'      => Controls_Manager::TEXT,
                    'default'   => esc_html__('Learn the Latest Top Skills', 'ecademy-toolkit'),
					'dynamic' => [
						'active' => true,
					],
                ]
            );
            $this->add_control(
                'card_item',
                [
                    'label' => esc_html__('Card Item', 'ecademy-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'features_Cards_style',
			[
				'label' => __( 'Style', 'ecademy-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'card_bg_color',
				[
					'label' => __( ' Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .instructor-features-area' => 'background-color: {{VALUE}}',
					],
				]
            );

            $this->add_control(
				'img_bg',
				[
					'label' => __( 'Image Icon Background Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .instructor-features-card .content .image-icon' => 'background-color: {{VALUE}}',
					],
				]
            );

          
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'ecademy-toolkit' ),
                    'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .instructor-features-card .content h3',
                ]
            );

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'ecademy-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .instructor-features-card .content h3' => 'color: {{VALUE}}',
					],
				]
            );

        $this->end_controls_section();
    }

	protected function render() {

		$settings = $this->get_settings_for_display();

        global $ecademy_opt;
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');

		?>
        <div class="instructor-features-area">
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach( $settings['card_item'] as $item ): ?>
                        <div class="<?php echo esc_attr($settings['columns']); ?>">
                            <div class="instructor-features-card">
                                <div class="content">
                                    <?php if($item['image']['url']): ?>
                                        <div class="image-icon">
                                            <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="el-messiri-font"><?php echo esc_html( $item['title'] ); ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
	}
}

Plugin::instance()->widgets_manager->register( new eCademy_Features_Card );