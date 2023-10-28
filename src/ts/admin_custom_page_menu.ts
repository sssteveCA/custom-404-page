import { AdminCustomPageMenuEvents } from "./classes/admin_custom_page_menu_events"
import { AdminCustomPageMenuEventsType } from "./types/types"
import { AdminCustomPageUpdateSettingsType } from "./types/types"

jQuery(()=>{
    const acpmet: AdminCustomPageMenuEventsType = {
        cb_enable_page: jQuery('#enable-custom-404'),
        cb_enable_image: jQuery('#enable-custom-404-image'),
        div_image_section: jQuery('#page-404-image-section'),
        input_file_image: jQuery('#custom-404-image'),
        cb_enable_text: jQuery('#enable-custom-404-text'),
        div_text_section: jQuery('#page-404-text-section'),
        ta_text: jQuery('#custom-404-text'),
        cb_show_articles: jQuery('#show-random-articles'),
        bt_save: jQuery('#custom-404-button')
    }
    const acpme: AdminCustomPageMenuEvents = new AdminCustomPageMenuEvents(acpmet)
    acpme.addEvents((acpust) => {

    })
})