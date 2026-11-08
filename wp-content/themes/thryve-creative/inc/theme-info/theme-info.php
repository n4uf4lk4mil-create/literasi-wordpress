<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add Theme Info Page
 */
function thryve_creative_add_theme_info_page() {
    add_theme_page(
        esc_html__( 'Thryve Creative', 'thryve-creative' ),
        esc_html__( 'Thryve Creative', 'thryve-creative' ),
        'manage_options',
        'thryve-creative-info',
        'thryve_creative_render_theme_info_page'
    );
}
add_action( 'admin_menu', 'thryve_creative_add_theme_info_page' );


/**
 * Enqueue CSS for Theme Info Page
 */
function thryve_creative_admin_assets( $hook ) {

    // Correct hook slug for your page
    if ( 'appearance_page_thryve-creative-info' !== $hook ) {
        return;
    }

    wp_enqueue_style(
        'thryve-creative-admin',
        get_template_directory_uri() . '/inc/theme-info/theme-info.css',
        array(),
        wp_get_theme()->get('Version') // better than hardcoded version
    );
}
add_action( 'admin_enqueue_scripts', 'thryve_creative_admin_assets' );



/**
 * Render Theme Info Page
 */
function thryve_creative_render_theme_info_page() {
    $pro_url     = 'https://thryvewp.com/themes/thryve-creative-pro/';
    $contact_url = 'https://thryvewp.com/contact';
    $docs_url    = 'https://thryvewp.com/documentation/';
    ?>

    <div class="thryvewp-wrap">
        <div class="thryvewp-info-wrap">

            <!-- Header -->
            <div class="thryvewp-info-header">
                <h1><strong><?php esc_html_e( 'Thryve Creative', 'thryve-creative' ); ?></strong></h1>
                <p><?php esc_html_e( 'A modern Full Site Editing WordPress theme built for businesses, agencies, and professionals.', 'thryve-creative' ); ?></p></br>
                <a href="<?php echo esc_url( $pro_url ); ?>" target="_blank" class="button button-primary button-hero">
                    <?php esc_html_e( 'Buy Pro', 'thryve-creative' ); ?>
                </a>                
            </div>

            <!-- Features -->
            <div class="thryvewp-info-features">

                <div class="thryvewp-feature-box">
                    <span class="dashicons dashicons-editor-expand"></span>
                    <h3><?php esc_html_e( 'Full Site Editing', 'thryve-creative' ); ?></h3>
                    <p><?php esc_html_e( 'Customize your entire website using Gutenberg blocks.', 'thryve-creative' ); ?></p>
                </div>

                <div class="thryvewp-feature-box">
                    <span class="dashicons dashicons-airplane"></span>
                    <h3><?php esc_html_e( 'Fast & Lightweight', 'thryve-creative' ); ?></h3>
                    <p><?php esc_html_e( 'Optimized for speed and performance.', 'thryve-creative' ); ?></p>
                </div>

                <div class="thryvewp-feature-box">
                    <span class="dashicons dashicons-cart"></span>
                    <h3><?php esc_html_e( 'WooCommerce Ready', 'thryve-creative' ); ?></h3>
                    <p><?php esc_html_e( 'Fully compatible with WooCommerce.', 'thryve-creative' ); ?></p>
                </div>

                <div class="thryvewp-feature-box">
                    <span class="dashicons dashicons-laptop"></span>
                    <h3><?php esc_html_e( 'Responsive Design', 'thryve-creative' ); ?></h3>
                    <p><?php esc_html_e( 'Looks perfect on all devices.', 'thryve-creative' ); ?></p>
                </div>

            </div>
            
            <!-- Setup Guide -->
            <div class="thryvewp-setup-guide">
                <h2><?php esc_html_e( 'Getting Started Guide', 'thryve-creative' ); ?></h2>
                <div class="thryvewp-setup-guide-list">
                    <div>
                        <h3>🏠 <?php esc_html_e( 'Setup Front Page and Post Page', 'thryve-creative' ); ?></h3>
                        <ol>
                            <li><?php esc_html_e( 'Settings → Reading.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Select "A static page" under Your homepage displays.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Choose your Homepage and Posts page.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Click Save Changes.', 'thryve-creative' ); ?></li>
                        </ol>
                    </div>
                    <div>
                        <h3>🖼️ <?php esc_html_e( 'Change Favicon and Site Logo', 'thryve-creative' ); ?></h3>
                        <ol>
                            <li><?php esc_html_e( 'Go to Appearance → Customize or Appearance → Editor.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Open Site Identity.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Upload your Logo and Site Icon.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Click Publish / Save.', 'thryve-creative' ); ?></li>
                        </ol>
                    </div>
                    <div>
                        <h3>✏️ <?php esc_html_e( 'Edit Front Page Template', 'thryve-creative' ); ?></h3>
                        <ol>
                            <li><?php esc_html_e( 'Go to Appearance → Editor.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Open Templates → Front Page.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Edit blocks and layout as needed.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Click Save.', 'thryve-creative' ); ?></li>
                        </ol>
                    </div>
                    <div>
                        <h3>🎨 <?php esc_html_e( 'Add Custom CSS', 'thryve-creative' ); ?></h3>
                        <ol>
                            <li><?php esc_html_e( 'Go to Appearance → Editor', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Click Styles → Additional CSS.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Add your CSS code and save.', 'thryve-creative' ); ?></li>
                        </ol>
                    </div>

                    <div>
                        <h3>🚀 <?php esc_html_e( 'What I Will Get on Pro Version', 'thryve-creative' ); ?></h3>
                        <ol>
                            <li><?php esc_html_e( 'Additional Patterns & Templates.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Regular updates and compatibility checks.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Dedicated support & some customization help.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Theme setup and demo file installation.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Upcoming features and updates.', 'thryve-creative' ); ?></li>
                        </ol>
                    </div>

                    <div>
                        <h3>🔑 <?php esc_html_e( 'How to Install Pro Version', 'thryve-creative' ); ?></h3>
                        <ol>
                            <li><?php esc_html_e( 'After purchasing the Pro version, log in to Freemius using the username and password you received at the time of purchase.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Download the Pro version ZIP file from your Freemius account.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Go to your WordPress Dashboard → Appearance → Themes → Add New.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Click on Upload Theme and upload the downloaded ZIP file.', 'thryve-creative' ); ?></li>
                            <li><?php esc_html_e( 'Activate the theme and enter your license key to enable Pro features.', 'thryve-creative' ); ?></li>
                        </ol>
                    </div>

                </div>          
            </div>
            <!-- Action Buttons -->
            <div class="thryvewp-info-actions">
                 <a href="<?php echo esc_url( $pro_url ); ?>" target="_blank" class="button button-primary button-hero">
                    <?php esc_html_e( 'Buy Pro', 'thryve-creative' ); ?>
                </a>
                
                <a href="<?php echo esc_url( $docs_url ); ?>" target="_blank" class="button button-secondary button-hero">
                    <?php esc_html_e( 'Documentation', 'thryve-creative' ); ?>
                </a>

                <a href="<?php echo esc_url( $contact_url ); ?>" target="_blank" class="button button-primary button-hero">
                    <?php esc_html_e( 'Contact Us', 'thryve-creative' ); ?>
                </a>
            </div>


        </div>
    </div>
<?php
}
