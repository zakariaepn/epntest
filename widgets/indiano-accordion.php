<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Indiano_Accordion extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'indiano-accordion';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Indiano Accordion', 'indiano' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'indiano_cat' ];
	}

	public function get_keywords() {
		return [ 'accordion','indiano' ];
	}   

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'invato-accordion',
		    [
		        'label' => esc_html__('Content','indiano'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'indiano_accordion_title',
			[
				'label' => esc_html__( 'FAQ Accordion Title', 'indiano' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Accordion title', 'indiano' ),
				'placeholder' => esc_html__( 'Type your accordion title here', 'indiano' ),
                'label_block' => true,
                'separator'   => "after"
                ]
		);

		$repeater->add_control(
			'indiano_accordion_desc',
			[
				'label' => esc_html__( 'FAQ Accordion Description', 'indiano' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ', 'indiano' ),
				'placeholder' => esc_html__( 'Type your accordion description here', 'indiano' ),
                'label_block' => true,
                'separator'   => "after"
                ]
		);

		$this->add_control(
			'acordion_lists',
			[
				'label' => esc_html__( 'Repeater List', 'indiano' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'indiano_accordion_title' => esc_html__( 'Title #1', 'indiano' ),
						'indiano_accordion_desc' => esc_html__( 'Item content. Click the edit button to change this text.', 'indiano' ),
					],
					[
						'indiano_accordion_title' => esc_html__( 'Title #2', 'indiano' ),
						'indiano_accordion_desc' => esc_html__( 'Item content. Click the edit button to change this text.', 'indiano' ),
					],
				],
				'title_field' => '{{{ indiano_accordion_title }}}',
			]
		);


		
		$this->end_controls_section();
		// end of the Content tab section
		
		

	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		
		$acordion_lists = $settings['acordion_lists'];
		
		
		?>
		
		<div class="accordion" id="accordionExample">
						<?php 

							$i = 0;
							foreach($acordion_lists as $acordion_list ){
								$i++;
								?> 
									 <div class="card">
											<div class="card-header" id="heading-<?php echo $i; ?>">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseOne">
													<?php echo $acordion_list['indiano_accordion_title']; ?> 
													</button>
												</h5>
											</div>
											<div id="collapse-<?php echo $i; ?>" class="collapse <?php if($i == 1){echo 'show'; } ?>" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
												<div class="card-body">
													<?php echo $acordion_list['indiano_accordion_desc']; ?>
												</div>
											</div>
										</div>

								<?php 
						} ?>
                        
                        
                     </div>
		
       <?php
	}
}