<?php

namespace DonationProgressBar\PostType;

use DonationProgressBar\Interface\ProgressBarServiceInterface;

class CampaignPostType implements ProgressBarServiceInterface
{
  public function register() {
        add_action('init', [$this, 'register_post_type']);
    }

    public function register_post_type() {
        register_post_type('campaign', [
            'labels' => [
                'name' => __('Campaigns'),
                'singular_name' => __('Campaign'),
            ],
            'public' => true,
            'has_archive' => true,
            'supports' => ['title', 'editor'],
            'show_in_rest' => true,
        ]);
    }
}

