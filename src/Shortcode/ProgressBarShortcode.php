<?php

namespace DonationProgressBar\Shortcode;
use DonationProgressBar\Interface\ProgressBarServiceInterface;

class ProgressBarShortcode implements ProgressBarServiceInterface {

    public function register() {
        add_shortcode('donation_progress', [$this, 'render_shortcode']);
    }

    public function render_shortcode($atts) {
        $atts = shortcode_atts([
            'id' => null,
        ], $atts);

        if (!$atts['id']) {
            return '<p>No campaign ID provided.</p>';
        }

        $goal = get_post_meta($atts['id'], '_dpb_goal', true);
        $raised = get_post_meta($atts['id'], '_dpb_raised', true);

        if (!$goal || !$raised) {
            return '<p>Invalid campaign data.</p>';
        }

        $percentage = min(100, ($raised / $goal) * 100);

        ob_start();
        ?>
        <div class="dpb-progress-bar-wrapper" style="width: 100%; background: #f3f3f3; border-radius: 5px; overflow: hidden;">
            <div class="dpb-progress-bar" style="width: <?php echo esc_attr($percentage); ?>%; background: #4caf50; height: 20px;"></div>
        </div>
        <p><?php echo esc_html($raised); ?> of <?php echo esc_html($goal); ?> raised (<?php echo round($percentage, 2); ?>%)</p>
        <?php
        return ob_get_clean();
    }
}
