<?php

namespace Swd;

use function FieldBlocks\register_reusable_block;

class ReusableBlocks {
	function init(): void {
		add_action( 'after_setup_theme', array( $this, 'register_blocks' ), 20 );
	}

	function register_blocks(): void {

		if ( ! function_exists( 'FieldBlocks\register_reusable_block' ) ) :
			return;
		endif;

		register_reusable_block(
			array(
				'label'  => 'Basic Content',
				'name'   => 'text_section_block',
				'blocks' => array(
					array(
						'id'       => 'text_section_reusable_block',
						'name'     => 'text_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Markets Content',
				'name'   => 'markets_section_block',
				'blocks' => array(
					array(
						'id'       => 'markets_section_reusable_block',
						'name'     => 'markets_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Benefits',
				'name'   => 'benefits_section_block',
				'blocks' => array(
					array(
						'id'       => 'benefits_section_reusable_block',
						'name'     => 'benefits_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Video/Image',
				'name'   => 'video_section_block',
				'blocks' => array(
					array(
						'id'       => 'video_section_reusable_block',
						'name'     => 'video_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Testimonials',
				'name'   => 'testimonials_section_block',
				'blocks' => array(
					array(
						'id'       => 'testimonials_section_reusable_block',
						'name'     => 'testimonials_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Milestones',
				'name'   => 'milestones_section_block',
				'blocks' => array(
					array(
						'id'       => 'milestones_section_reusable_block',
						'name'     => 'milestones_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Metrics',
				'name'   => 'metrics_section_block',
				'blocks' => array(
					array(
						'id'       => 'metrics_section_reusable_block',
						'name'     => 'metrics_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'News',
				'name'   => 'news_section_block',
				'blocks' => array(
					array(
						'id'       => 'news_section_reusable_block',
						'name'     => 'news_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Newsletter',
				'name'   => 'newsletter_section_block',
				'blocks' => array(
					array(
						'id'       => 'newsletter_section_reusable_block',
						'name'     => 'newsletter_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Downloads',
				'name'   => 'downloads_section_block',
				'blocks' => array(
					array(
						'id'       => 'downloads_section_reusable_block',
						'name'     => 'downloads_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'History',
				'name'   => 'history_section_block',
				'blocks' => array(
					array(
						'id'       => 'history_section_reusable_block',
						'name'     => 'history_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Team',
				'name'   => 'team_section_block',
				'blocks' => array(
					array(
						'id'       => 'team_section_reusable_block',
						'name'     => 'team_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Technologien',
				'name'   => 'technologien_section_block',
				'blocks' => array(
					array(
						'id'       => 'technologien_section_reusable_block',
						'name'     => 'technologien_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Contact Box',
				'name'   => 'contactbox_section_block',
				'blocks' => array(
					array(
						'id'       => 'contactbox_section_reusable_block',
						'name'     => 'contactbox_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Factbox',
				'name'   => 'factbox_section_block',
				'blocks' => array(
					array(
						'id'       => 'factbox_section_reusable_block',
						'name'     => 'factbox_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Thema',
				'name'   => 'thema_section_block',
				'blocks' => array(
					array(
						'id'       => 'thema_section_reusable_block',
						'name'     => 'thema_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Gallery',
				'name'   => 'gallery_section_block',
				'blocks' => array(
					array(
						'id'       => 'gallery_section_reusable_block',
						'name'     => 'gallery_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Small card',
				'name'   => 'small_section_block',
				'blocks' => array(
					array(
						'id'       => 'small_section_reusable_block',
						'name'     => 'small_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Contact wide',
				'name'   => 'contact_wide_section_block',
				'blocks' => array(
					array(
						'id'       => 'contact_wide_section_reusable_block',
						'name'     => 'contact_wide_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Download button',
				'name'   => 'download_button_section_block',
				'blocks' => array(
					array(
						'id'       => 'download_button_section_reusable_block',
						'name'     => 'download_button_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Document block',
				'name'   => 'document_button_section_block',
				'blocks' => array(
					array(
						'id'       => 'document_button_section_reusable_block',
						'name'     => 'document_button_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Video accordion',
				'name'   => 'video_accordion_section_block',
				'blocks' => array(
					array(
						'id'       => 'video_accordion_section_reusable_block',
						'name'     => 'video_accordion_section',
						'settings' => array(),
					),
				),
			)
		);
		register_reusable_block(
			array(
				'label'  => 'Blog Shortcode',
				'name'   => 'blog_shortcode_section_block',
				'blocks' => array(
					array(
						'id'       => 'blog_shortcode_section_reusable_block',
						'name'     => 'blog_shortcode_section',
						'settings' => array(),
					),
				),
			)
		);
	}

}
