import { AdminCustomPageMenuEvents } from "./classes/admin_custom_page_menu_events"
import { AdminCustomPageMenuEventsType } from "./types/types"
import { AdminCustomPageUpdateSettingsType } from "./types/types"

$(()=>{
    const acpmet: AdminCustomPageMenuEventsType = {
        cb_enable_page: $('#enable-custom-404'),
        cb_enable_image: $('#enable-custom-404-image'),
        div_image_section: $('#page-404-image-section'),
        input_file_image: $('#custom-404-image'),
        cb_enable_text: $('#enable-custom-404-text'),
        div_text_section: $('#page-404-text-section'),
        ta_text: $('#custom-404-text'),
        cb_show_articles: $('#show-random-articles'),
        bt_save: $('#custom-404-button')
    }
    const acpme: AdminCustomPageMenuEvents = new AdminCustomPageMenuEvents(acpmet)
    acpme.addEvents((acpust) => {
        
    })
})