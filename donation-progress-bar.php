<?php

use DonationProgressBar\Metabox\CampaignMetaBox;
use DonationProgressBar\PostType\CampaignPostType;
use DonationProgressBar\Shortcode\ProgressBarShortcode;
use DonationProgressBar\Interface\ProgressBarServiceInterface;
/**
 * Plugin Name: Donation Progress Bar
 * Description: Display a customizable progress bar for donation campaigns.
 * Version: 1.0
 * Author: Md Mostafizur Rahman
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}


require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

class DonationProgressBar {

    private $services = [];

    public function __construct() {
        $this->services = [
            new CampaignPostType(),
            new CampaignMetaBox(),
            new ProgressBarShortcode(),
        ];
    }

    public function register_services() {
        foreach ($this->services as $service) {
            if ($service instanceof ProgressBarServiceInterface) {
                $service->register();
            }
        }
    }
}

$donationProgressBar = new DonationProgressBar();
$donationProgressBar->register_services();
