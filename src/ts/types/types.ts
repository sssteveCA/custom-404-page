
/**
 * Type for AdminCustomPageMenuEvents class
 */
export type AdminCustomPageMenuEventsType = {
  
    cb_enable_page: JQuery<HTMLInputElement>;
    cb_enable_image: JQuery<HTMLInputElement>;
    div_image_section: JQuery<HTMLDivElement>;
    input_file_image: JQuery<HTMLInputElement>;
    input_image_path: JQuery<HTMLInputElement>;
    cb_enable_text: JQuery<HTMLInputElement>;
    div_text_section: JQuery<HTMLDivElement>;
    ta_text: JQuery<HTMLTextAreaElement>;
    cb_show_articles: JQuery<HTMLInputElement>;
    bt_save: JQuery<HTMLButtonElement>;
}

/**
 * Type for AdminCustomPageUpdateSettings class
 */
export type AdminCustomPageUpdateSettingsType = {
    enable_page: boolean;
    enable_image: boolean;
    image_path: string;
    enable_text: boolean;
    text: string;
    show_articles: boolean;
}

/**
 * Type for MediaUploader class
 */
export type MediaUploaderType = {
    input_file: JQuery<HTMLInputElement>;
    input_image_path: JQuery<HTMLInputElement>;
    image_url_div: JQuery<HTMLDivElement>;
}