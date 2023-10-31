import { AdminCustomPageMenuEventsType, AdminCustomPageUpdateSettingsType } from "../types/types";

/**
 * This class add the listeners to provided HTML DOM elements
 */
export class AdminCustomPageMenuEvents{

    private _cb_enable_custom_404_page: JQuery<HTMLInputElement>;
    private _cb_use_title: JQuery<HTMLInputElement>;
    private _div_title_section: JQuery<HTMLDivElement>;
    private _input_title: JQuery<HTMLInputElement>;
    private _cb_use_image: JQuery<HTMLInputElement>;
    private _div_image_section: JQuery<HTMLDivElement>;
    private _input_file_image: JQuery<HTMLInputElement>;
    private _input_image_path: JQuery<HTMLInputElement>;
    private _cb_use_text: JQuery<HTMLInputElement>;
    private _div_text_section: JQuery<HTMLDivElement>;
    private _ta_text: JQuery<HTMLTextAreaElement>;
    private _cb_show_articles: JQuery<HTMLInputElement>;
    private _div_post_image_section: JQuery<HTMLDivElement>;
    private _input_file_post_image: JQuery<HTMLInputElement>;
    private _input_post_image_path: JQuery<HTMLInputElement>;
    private _bt_save: JQuery<HTMLButtonElement>;

    constructor(data: AdminCustomPageMenuEventsType){
        this._cb_enable_custom_404_page = data.cb_enable_custom_404_page;
        this._cb_use_title = data.cb_use_title;
        this._div_title_section = data.div_title_section;
        this._input_title = data.input_title;
        this._cb_use_image = data.cb_use_image;
        this._div_image_section = data.div_image_section;
        this._input_image_path = data.input_image_path;
        this._input_file_image = data.input_file_image;
        this._cb_use_text = data.cb_use_text;
        this._div_text_section = data.div_text_section;
        this._ta_text = data.ta_text;
        this._cb_show_articles = data.cb_show_articles;
        this._div_post_image_section = data.div_post_image_section;
        this._input_file_post_image = data.input_file_post_image;
        this._input_post_image_path = data.input_post_image_path;
        this._bt_save = data.bt_save;
    }

    get cb_enable_custom_404_page(){ return this._cb_enable_custom_404_page; }
    get cb_use_image(){ return this._cb_use_image; }
    get div_image_section(){ return this._div_image_section; }
    get input_file_image(){ return this._input_file_image; }
    get input_image_path(){ return this._input_image_path; }
    get cb_use_text(){ return this._cb_use_text; }
    get div_text_section(){ return this._div_text_section; }
    get ta_text(){ return this._ta_text; }
    get cb_show_articles(){ return this._cb_show_articles; }
    get div_post_image_section(){ return this._div_post_image_section; }
    get input_file_post_image(){ return this._input_file_post_image; }
    get input_post_image_path(){ return this._input_post_image_path; }
    get bt_save(){ return this._bt_save; }

    /**
     * Add listeners to HTML elements
     * @param onSaveButtonClick callback when settings save button has been clicked
     */
    public addEvents(onSaveButtonClick: (acpust: AdminCustomPageUpdateSettingsType) => void){
        this.setEnablePageEvent();
        this.setEnableTitleEvent();
        this.setEnableImageEvent();
        this.setEnableTextEvent();
        this.setShowArticlesEvent();
        this.setSaveButtonEvent(onSaveButtonClick)
    }

    /**
     * Set the behavior when the enable custom 404 page checkbox value change
     */
    private setEnablePageEvent(): void{
        this._cb_enable_custom_404_page.on('change',()=>{
            if(this._cb_enable_custom_404_page.is(':checked')){
                this._cb_use_title.prop('disabled',false)
                this._cb_use_image.prop('disabled',false)
                this._cb_use_text.prop('disabled',false)
                this._cb_show_articles.prop('disabled',false)
            }
            else{
                this._cb_use_title.prop('disabled',true)
                this._cb_use_title.prop('checked',false)
                this._cb_use_title.val('false')
                if(!this._div_title_section.hasClass('d-none'))
                    this._div_title_section.addClass('d-none')
                this._cb_use_image.prop('disabled',true)
                this._cb_use_image.prop('checked',false)
                this._cb_use_image.val('false')
                if(!this._div_image_section.hasClass('d-none'))
                    this._div_image_section.addClass('d-none')
                this._cb_use_text.prop('disabled',true)
                this._cb_use_text.prop('checked',false)
                this._cb_use_text.val('false')
                if(!this._div_text_section.hasClass('d-none'))
                    this._div_text_section.addClass('d-none')
                this._cb_show_articles.prop('disabled',true)
                this._cb_show_articles.prop('checked',false)
                this._cb_show_articles.val('false')
                if(!this._div_post_image_section.hasClass('d-none'))
                    this._div_post_image_section.addClass('d-none')
            }
        })
    }

    /**
     *  Set the behavior when the use title checkbox value change
     */
    private setEnableTitleEvent(): void{
        this._cb_use_title.on('change',()=>{
            if(this._cb_use_title.is(':checked')){
                this._cb_use_title.val('true')
                if(this._div_title_section.hasClass('d-none'))
                    this._div_title_section.removeClass('d-none')
            }
            else{
                this._cb_use_title.val('false')
                if(!this._div_title_section.hasClass('d-none'))
                    this._div_title_section.addClass('d-none')
            }
        })
    }

    /**
     * Set the behavior when the use image checkbox value change
     */
    private setEnableImageEvent(): void{
        this._cb_use_image.on('change',()=>{
            if(this._cb_use_image.is(':checked')){
                this._cb_use_image.val('true')
                if(this._div_image_section.hasClass('d-none'))
                    this._div_image_section.removeClass('d-none')
            }
            else{
                this._cb_use_image.val('false')
                if(!this._div_image_section.hasClass('d-none'))
                    this._div_image_section.addClass('d-none')
            }
        })
    }

    /**
     * Set the behavior when the use text checkbox value change
     */
    private setEnableTextEvent(): void{
        this._cb_use_text.on('change',()=>{
            if(this._cb_use_text.is(':checked')){
                this._cb_use_text.val('true')
                if(this._div_text_section.hasClass('d-none'))
                    this._div_text_section.removeClass('d-none')
            }
            else{
                this._cb_use_text.val('false')
                if(!this._div_text_section.hasClass('d-none'))
                    this._div_text_section.addClass('d-none')
            }
        })
    }

    /**
     * Set the behavior when the show articles value change
     */
    private setShowArticlesEvent(): void{
        this._cb_show_articles.on('change',()=>{
            if(this._cb_show_articles.is(':checked')){
                this._cb_show_articles.val('true')
                if(this._div_post_image_section.hasClass('d-none'))
                    this._div_post_image_section.removeClass('d-none')
            }
            else{
                this._cb_show_articles.val('false')
                if(!this._div_post_image_section.hasClass('d-none'))
                    this._div_post_image_section.addClass('d-none')
            }
        })
    }

    /**
     * When the update settings button has been clicked
     * @param callback the callback to invoke on button click
     */
    private setSaveButtonEvent(callback: (acpust: AdminCustomPageUpdateSettingsType) => void): void{
        this._bt_save.on('click',()=>{
            const acpustType: AdminCustomPageUpdateSettingsType = {
                enable_custom_404_page: this._cb_enable_custom_404_page.val() as string,
                use_title: this._cb_use_title.val() as string,
                title: this._input_title.val() as string,
                use_image: this._cb_use_image.val() as string,
                image_path: this._input_image_path.val() as string,
                use_text: this._cb_use_text.val() as string,
                text: this._ta_text.val() as string,
                show_articles: this._cb_show_articles.val() as string,
                post_image_path: this._input_post_image_path.val() as string
            }
            callback(acpustType);
        })
    }
}