<?php

namespace Swd;

use function FieldBlocks\register_atom_block;
use Swd\Atoms\SimpleTextAtom;
use Swd\Atoms\VideoBlockAtom;
use Swd\Atoms\BenefitsAtom;
use Swd\Atoms\MarketsAtom;
use Swd\Atoms\TestimonialsAtom;
use Swd\Atoms\MilestonesAtom;
use Swd\Atoms\MetricsAtom;
use Swd\Atoms\NewsBlockAtom;
use Swd\Atoms\NewsLetterBlockAtom;
use Swd\Atoms\DownloadsAtom;
use Swd\Atoms\HistoryAtom;
use Swd\Atoms\TeamAtom;
use Swd\Atoms\TechnologienAtom;
use Swd\Atoms\ContactBoxAtom;
use Swd\Atoms\ContactWideAtom;
use Swd\Atoms\FactBoxAtom;
use Swd\Atoms\ThemaAtom;
use Swd\Atoms\GalleryAtom;
use Swd\Atoms\SmallAtom;
use Swd\Atoms\DownloadAtom;
use Swd\Atoms\DocumentAtom;
use Swd\Atoms\VideoAccordionAtom;
use Swd\Atoms\BlogShortcodeAtom;

class AtomBlocks {


	function init(): void {
		add_action( 'after_setup_theme', array( $this, 'register_atom_blocks' ), 10 );
	}

	public function __construct(
		public SimpleTextAtom $simple_text_section_atom,
		public VideoBlockAtom $video_block_atom,
		public BenefitsAtom $benefits_block_atom,
		public MarketsAtom $markets_block_atom,
		public TestimonialsAtom $testimonial_block_atom,
		public MilestonesAtom $milestones_block_atom,
		public MetricsAtom $metrics_block_atom,
		public NewsBlockAtom $news_block_atom,
		public NewsLetterBlockAtom $newsletter_block_atom,
		public DownloadsAtom $downloads_section_atom,
		public HistoryAtom $history_section_atom,
		public TeamAtom $team_section_atom,
		public TechnologienAtom $technologien_section_atom,
		public ContactBoxAtom $contactbox_section_atom,
		public FactBoxAtom $factbox_section_atom,
		public ThemaAtom $thema_section_atom,
		public GalleryAtom $gallery_section_atom,
		public SmallAtom $small_section_atom,
		public ContactWideAtom $contact_wide_section_atom,
		public DownloadAtom $download_section_atom,
		public DocumentAtom $document_section_atom,
		public VideoAccordionAtom $video_accordion_section_atom,
		public BlogShortcodeAtom $blog_shortcode_section_atom,
	) {
	}
	function register_atom_blocks() {
		if ( ! function_exists( 'FieldBlocks\register_atom_block' ) ) :
			return;
		endif;
		// Video Section
		register_atom_block(
			array(
				'field_group_key' => 'field_64d4fb21865da',
				'name'            => 'video_section',
				'render_callback' => array( $this->video_block_atom, 'render' ),
				'css'             => array( 'swd-video-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64d9f1a2527d3',
				'name'            => 'markets_section',
				'render_callback' => array( $this->markets_block_atom, 'render' ),
				'css'             => array( 'swd-markets-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64da0355bb412',
				'name'            => 'milestones_section',
				'render_callback' => array( $this->milestones_block_atom, 'render' ),
				'css'             => array( 'swd-milestones-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64d9ff4c04675',
				'name'            => 'testimonials_section',
				'render_callback' => array( $this->testimonial_block_atom, 'render' ),
				'css'             => array( 'swd-testimonials-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64da0995fe672',
				'name'            => 'metrics_section',
				'render_callback' => array( $this->metrics_block_atom, 'render' ),
				'css'             => array( 'swd-metrics-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64da27997d6c3',
				'name'            => 'news_section',
				'render_callback' => array( $this->news_block_atom, 'render' ),
				'css'             => array( 'swd-news-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64da3457131aa',
				'name'            => 'newsletter_section',
				'render_callback' => array( $this->newsletter_block_atom, 'render' ),
				'css'             => array( 'swd-newsletter-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64d62f1c82ecf',
				'name'            => 'benefits_section',
				'render_callback' => array( $this->benefits_block_atom, 'render' ),
				'css'             => array( 'swd-benefits-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64d4e9d2fa77e',
				'name'            => 'text_section',
				'render_callback' => array( $this->simple_text_section_atom, 'render' ),
				'css'             => array( 'swd-simple-text-block' ),
			)
		);

		register_atom_block(
			array(
				'field_group_key' => 'field_64dcaac6e231f',
				'name'            => 'downloads_section',
				'render_callback' => array( $this->downloads_section_atom, 'render' ),
				'css'             => array( 'swd-downloads-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64e37dfc69d6a',
				'name'            => 'history_section',
				'render_callback' => array( $this->history_section_atom, 'render' ),
				'css'             => array( 'swd-history-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64e387089704c',
				'name'            => 'team_section',
				'render_callback' => array( $this->team_section_atom, 'render' ),
				'css'             => array( 'swd-team-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64e87d171e32e',
				'name'            => 'technologien_section',
				'render_callback' => array( $this->technologien_section_atom, 'render' ),
				'css'             => array( 'swd-technologien-block' ),
			)
		);

		register_atom_block(
			array(
				'field_group_key' => 'field_64ec73a303e22',
				'name'            => 'contactbox_section',
				'render_callback' => array( $this->contactbox_section_atom, 'render' ),
				'css'             => array( 'swd-contactbox-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ec742b4d7d5',
				'name'            => 'factbox_section',
				'render_callback' => array( $this->factbox_section_atom, 'render' ),
				'css'             => array( 'swd-factbox-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ec79af4fb50',
				'name'            => 'thema_section',
				'render_callback' => array( $this->thema_section_atom, 'render' ),
				'css'             => array( 'swd-thema-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ec821f71361',
				'name'            => 'gallery_section',
				'render_callback' => array( $this->gallery_section_atom, 'render' ),
				'css'             => array( 'swd-gallery-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ec842afb441',
				'name'            => 'small_section',
				'render_callback' => array( $this->small_section_atom, 'render' ),
				'css'             => array( 'swd-small-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ec88e93c010',
				'name'            => 'contact_wide_section',
				'render_callback' => array( $this->contact_wide_section_atom, 'render' ),
				'css'             => array( 'swd-contact-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ec93c2b24ef',
				'name'            => 'download_button_section',
				'render_callback' => array( $this->download_section_atom, 'render' ),
				'css'             => array( 'swd-download-button-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ec97d3794f8',
				'name'            => 'document_button_section',
				'render_callback' => array( $this->document_section_atom, 'render' ),
				'css'             => array( 'swd-document-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ec9b399bff2',
				'name'            => 'video_accordion_section',
				'render_callback' => array( $this->video_accordion_section_atom, 'render' ),
				'css'             => array( 'swd-video-accordion-block' ),
			)
		);
		register_atom_block(
			array(
				'field_group_key' => 'field_64ef556286c1d',
				'name'            => 'blog_shortcode_section',
				'render_callback' => array( $this->blog_shortcode_section_atom, 'render' ),
				'css'             => array( 'swd-blog-shortcode-block' ),
			)
		);

	}


}
