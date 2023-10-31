
/**
 * Type for AdminCustomPageMenuEvents class
 */
export type AdminCustomPageMenuEventsType = {
  
    cb_enable_custom_404_page: JQuery<HTMLInputElement>;
    cb_use_title: JQuery<HTMLInputElement>;
    div_title_section: JQuery<HTMLInputElement>;
    input_title: JQuery<HTMLInputElement>;
    cb_use_image: JQuery<HTMLInputElement>;
    div_image_section: JQuery<HTMLDivElement>;
    input_file_image: JQuery<HTMLInputElement>;
    input_image_path: JQuery<HTMLInputElement>;
    cb_use_text: JQuery<HTMLInputElement>;
    div_text_section: JQuery<HTMLDivElement>;
    ta_text: JQuery<HTMLTextAreaElement>;
    cb_show_articles: JQuery<HTMLInputElement>;
    div_post_image_section: JQuery<HTMLDivElement>;
    input_file_post_image: JQuery<HTMLInputElement>;
    input_post_image_path: JQuery<HTMLInputElement>;
    bt_save: JQuery<HTMLButtonElement>;
}

/**
 * Type for AdminCustomPageUpdateSettings class
 */
export type AdminCustomPageUpdateSettingsType = {
    enable_custom_404_page: string;
    use_title: string;
    title: string;
    use_image: string;
    image_path: string;
    use_text: string;
    text: string;
    show_articles: string;
    post_image_path: string;
}

/**
 * Type for MediaUploader class
 */
export type MediaUploaderType = {
    input_file: JQuery<HTMLInputElement>;
    input_image_path: JQuery<HTMLInputElement>;
    image_url_div: JQuery<HTMLDivElement>;
}

/**
 * Type for PostMediaUploader class
 */
export type PostMediaUploaderType = {
    input_file_post: JQuery<HTMLInputElement>;
    input_post_image_path: JQuery<HTMLInputElement>;
    post_image_url_div: JQuery<HTMLDivElement>;
}