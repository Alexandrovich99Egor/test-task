<?php
namespace Swd;

defined( 'ABSPATH' ) || exit;

class Hooks {

	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {

			acf_add_options_page();

		}
		add_action(
			'widgets_init',
			function () {
				register_sidebar(
					apply_filters(
						'astra_widgets_init',
						array(
							'name'          => esc_html__( 'Technologien Sidebar', 'astra' ),
							'id'            => 'technologien-1',
							'description'   => '',
							'before_widget' => '<aside id="%1$s" class="widget %2$s">',
							'after_widget'  => '</aside>',
							'before_title'  => '<h2 class="widget-title">',
							'after_title'   => '</h2>',
						)
					)
				);
				register_sidebar(
					apply_filters(
						'astra_widgets_init',
						array(
							'name'          => esc_html__( 'Blog Sidebar', 'astra' ),
							'id'            => 'blog-1',
							'description'   => '',
							'before_widget' => '<aside id="%1$s" class="widget %2$s">',
							'after_widget'  => '</aside>',
							'before_title'  => '<h2 class="widget-title">',
							'after_title'   => '</h2>',
						)
					)
				);
			}
		);
		add_filter(
			'asp_before_ajax_output',
			function ( $html_results, $id, $results ) {
				if ( $id == 2 ) {
					$html_results = '';
					foreach ( $results as $result ) {
							$html_results     .= '<div class="news-item asp_r_post">';
							$html_results     .= '<div class="news-item-thumb">' . get_the_post_thumbnail( $result->id, 'full' ) . '</div>';
							$html_results     .= '<div class="news-content">';
								$html_results .= '<span class="news-item-date">' . get_the_date( 'd.m.Y', $result->id ) . ' ' . ( get_field( 'read_time', $result->id ) ? '- ' . get_field( 'read_time', $result->id ) : '' ) . '</span>';
								$html_results .= '<div class="news-item-title">' . $result->title . '</div>';
								$html_results .= '<div class="news-item-excerpt">' . $result->excerpt . '</div>';
								$html_results .= '<a href="' . get_permalink( $result->id ) . '" class="button">' . __( 'Ganzen Artikel lesen', 'swd' ) . '</a>';
							$html_results     .= '</div>';
						$html_results         .= '</div>';
					}
				}
				return $html_results;
			},
			10,
			4
		);
		add_filter(
			'astra_get_sidebar',
			function ( $sidebar ) {
				global $post;
				$defined_sidebar = get_field( 'sidebar', $post->ID );
				if ( $defined_sidebar ) {
					return $defined_sidebar;
				} else {
					return $sidebar;
				}
			}
		);
	}
}
