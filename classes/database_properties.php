<?php

namespace CustomErrorPage\Classes;

/**
 * Custom 404 page SQL database properties
 */
class DatabaseProperties{

    /**
     * If the custom 404 page must be shown on 404 errors
     */
    protected string $enable_custom_404_page;

    /**
     * If the page has a custom title
     */
    protected string $use_title;

    /**
     * The custom 404 page header title
     */
    protected string $title;

    /**
     * If the page has an image
     */
    protected string $use_image;

    /**
     * The image for the 404 page (only if use_image is true)
     */
    protected string $image_path;

    /**
     * If the page has custom text
     */
    protected string $use_text;

    /**
     * The text for the 404 page (only if use_text is true)
     */
    protected ?string $text;

    /**
     * If the 404 page must show some random articles
     */
    protected string $show_articles;

    /**
     * URL of default post thumbnail
     */
    protected string $post_image_path;

}