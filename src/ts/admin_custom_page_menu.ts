import { AdminCustomPageMenuEvents } from "./classes/admin_custom_page_menu_events"
import { AdminCustomPageUpdateSettings } from "./classes/admin_custom_page_update_settings"
import { MediaUploader } from "./classes/media_uploader"
import { PostMediaUploader } from "./classes/post_media_uploader"
import { Constants } from "./namespace/constants"
import { AdminCustomPageMenuEventsType, MediaUploaderType, PostMediaUploaderType } from "./types/types"
import { AdminCustomPageUpdateSettingsType } from "./types/types"

jQuery(()=>{
    const mut: MediaUploaderType = {
        input_file: jQuery('#custom-404-image'),
        input_image_path: jQuery('#custom-404-image-path'),
        image_url_div: jQuery('#custom-404-image-path-div')
    }
    const mu: MediaUploader = new MediaUploader(mut)
    const pmut: PostMediaUploaderType = {
        input_file_post: jQuery('#custom-404-post-image'),
        input_post_image_path: jQuery('#custom-404-post-image-path'),
        post_image_url_div: jQuery('#custom-404-post-image-path-div')
    }
    const pmu: PostMediaUploader = new PostMediaUploader(pmut)
    const acpmet: AdminCustomPageMenuEventsType = {
        cb_enable_custom_404_page: jQuery('#enable-custom-404-page'),
        cb_use_title: jQuery('#use-custom-404-title'),
        div_title_section: jQuery('#custom-404-title-section'),
        input_title: jQuery('#custom-404-title'),
        cb_use_image: jQuery('#use-custom-404-image'),
        div_image_section: jQuery('#custom-404-image-section'),
        input_file_image: jQuery('#custom-404-image'),
        input_image_path: jQuery('#custom-404-image-path'),
        cb_use_text: jQuery('#use-custom-404-text'),
        div_text_section: jQuery('#page-404-text-section'),
        ta_text: jQuery('#custom-404-text'),
        cb_show_articles: jQuery('#show-random-articles'),
        div_post_image_section: jQuery('#custom-404-post-image-section'),
        input_file_post_image: jQuery('#custom-404-post-image'),
        input_post_image_path: jQuery('#custom-404-post-image-path'),
        bt_save: jQuery('#custom-404-button')
    }
    const spinner: JQuery<HTMLDivElement> = jQuery('#custom-404-button-spinner')
    const acpme: AdminCustomPageMenuEvents = new AdminCustomPageMenuEvents(acpmet)
    acpme.addEvents((acpust) => {
        const div_message: JQuery<HTMLDivElement> = jQuery('#custom-404-us-message')
        div_message.html('')
        spinner.toggleClass('d-none')
        const acpus: AdminCustomPageUpdateSettings = new AdminCustomPageUpdateSettings(acpust)
        acpus.updateSettings().then(res => {
            spinner.toggleClass('d-none')
            if(res[Constants.KEY_DONE] == true)
                div_message.css('color','green')
            else
                div_message.css('color','red')
            div_message.html(res[Constants.KEY_MESSAGE])
        })
    })
})