<?php

namespace DonationProgressBar\Metabox;

use DonationProgressBar\Interface\ProgressBarServiceInterface;

class CampaignMetaBox implements ProgressBarServiceInterface
{
   public function register() {
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_data']);
    }

    public function add_meta_boxes() {
        add_meta_box(
            'dpb_campaign_meta',
            __('Campaign Details'),
            [$this, 'render_meta_box'],
            'campaign',
            'side'
        );
    }

    public function render_meta_box($post) {
        $goal = get_post_meta($post->ID, '_dpb_goal', true);
        $raised = get_post_meta($post->ID, '_dpb_raised', true);
        ?>
        <label for="dpb_goal">Donation Goal:</label>
        <input type="number" id="dpb_goal" name="dpb_goal" value="<?php echo esc_attr($goal); ?>" style="width: 100%;">

        <label for="dpb_raised">Amount Raised:</label>
        <input type="number" id="dpb_raised" name="dpb_raised" value="<?php echo esc_attr($raised); ?>" style="width: 100%;">
        <?php
    }

    public function save_meta_data($post_id) {
        if (isset($_POST['dpb_goal'])) {
            update_post_meta($post_id, '_dpb_goal', sanitize_text_field($_POST['dpb_goal']));
        }
        if (isset($_POST['dpb_raised'])) {
            update_post_meta($post_id, '_dpb_raised', sanitize_text_field($_POST['dpb_raised']));
        }
    }
}

