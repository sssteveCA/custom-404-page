
/**
 * Type for AdminCustomPageMenuEvents class
 */
export type AdminCustomPageMenuEventsType = {
  
    /**
     * Checkbox to choose whether to use the 404 page
     */
    cb_enable_custom_404_page: JQuery<HTMLInputElement>;
    /**
     * Checkbox to choose whether to use a header title for the 404 page
     */
    cb_use_title: JQuery<HTMLInputElement>;
    /**
     * Container showed if the use title checkbox is checked
     */
    div_title_section: JQuery<HTMLInputElement>;
    /**
     * The HTML input field for the page's title
     */
    input_title: JQuery<HTMLInputElement>;
    /**
     * Checkbox to choose whether to use an image for the 404 page
     */
    cb_use_image: JQuery<HTMLInputElement>;
    /**
     * Container showed if the use image checkbox is checked
     */
    div_image_section: JQuery<HTMLDivElement>;
    /**
     * The HTML input to choose the image of the page
     */
    input_file_image: JQuery<HTMLInputElement>;
    /**
     * The URL of the chosen image
     */
    input_image_path: JQuery<HTMLInputElement>;
    /**
     * Checkbox to choose whether to use a message for the 404 page
     */
    cb_use_text: JQuery<HTMLInputElement>;
    /**
     * Container showed if the use text checkbox is checked
     */
    div_text_section: JQuery<HTMLDivElement>;
    /**
     * The HTML textarea for the message of the page
     */
    ta_text: JQuery<HTMLTextAreaElement>;
    /**
     * Checkbox to choose whether to show other random articles to redirect the user
     */
    cb_show_articles: JQuery<HTMLInputElement>;
    /**
     * Container showed if the show articles checkbox is checked
     */
    div_post_image_section: JQuery<HTMLDivElement>;
    /**
     * The HTML input to choose the thumbnail for each random article displayed
     */
    input_file_post_image: JQuery<HTMLInputElement>;
    /**
     * The URL of the chosen thumbnail
     */
    input_post_image_path: JQuery<HTMLInputElement>;
    /**
     * The HTML button to confirm the settings
     */
    bt_save: JQuery<HTMLButtonElement>;
}

/**
 * Type for AdminCustomPageUpdateSettings class
 */
export type AdminCustomPageUpdateSettingsType = {
    /**
     * Set whether the custom 404 page should be shown
     */
    enable_custom_404_page: string;
    /**
     * Set whether an header title should be shown
     */
    use_title: string;
    /**
     * The header title, if it must be shown
     */
    title: string;
    /**
     * Set whether an image should be shown
     */
    use_image: string;
    /**
     * The image URL, if it must be shown
     */
    image_path: string;
    /**
     * Set whether the a text message should be shown
     */
    use_text: string;
    /**
     * The text message, if it must be shown
     */
    text: string;
    /**
     * Set whether a list of random articles, should be shown
     */
    show_articles: string;
    /**
     * The thumbnail URL of each displayed articles, if they must be shown
     */
    post_image_path: string;
}

/**
 * Type for MediaUploader class
 */
export type MediaUploaderType = {
    /**
     * The HTML input file element, to choose the image of the page
     */
    input_file: JQuery<HTMLInputElement>;
    /**
     * The URL of the chosen image
     */
    input_image_path: JQuery<HTMLInputElement>;
    /**
     * The div that shows the URL of the chosen image
     */
    image_url_div: JQuery<HTMLDivElement>;
}

/**
 * Type for PostMediaUploader class
 */
export type PostMediaUploaderType = {
    /**
     * The HTML input file element, to choose the thumbnail fot the articles list
     */
    input_file_post: JQuery<HTMLInputElement>;
    /**
     * The div that shows the URL of the chosen image
     */
    input_post_image_path: JQuery<HTMLInputElement>;
    /**
     * The div that shows the URL of the chosen thumbnail
     */
    post_image_url_div: JQuery<HTMLDivElement>;
}