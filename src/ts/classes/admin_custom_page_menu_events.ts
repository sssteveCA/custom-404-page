import { AdminCustomPageMenuEventsType, AdminCustomPageUpdateSettingsType } from "../types/types";

/**
 * This class add the listeners to provided HTML DOM elements
 */
export class AdminCustomPageMenuEvents{

    private _cb_enable_page: JQuery<HTMLInputElement>;
    private _cb_enable_image: JQuery<HTMLInputElement>;
    private _div_image_section: JQuery<HTMLDivElement>;
    private _input_file_image: JQuery<HTMLInputElement>;
    private _input_image_path: JQuery<HTMLInputElement>;
    private _cb_enable_text: JQuery<HTMLInputElement>;
    private _div_text_section: JQuery<HTMLDivElement>;
    private _ta_text: JQuery<HTMLTextAreaElement>;
    private _cb_show_articles: JQuery<HTMLInputElement>;
    private _bt_save: JQuery<HTMLButtonElement>;

    constructor(data: AdminCustomPageMenuEventsType){
        this._cb_enable_page = data.cb_enable_page;
        this._cb_enable_image = data.cb_enable_image;
        this._div_image_section = data.div_image_section;
        this._input_image_path = data.input_image_path;
        this._input_file_image = data.input_file_image;
        this._cb_enable_text = data.cb_enable_text;
        this._div_text_section = data.div_text_section;
        this._ta_text = data.ta_text;
        this._cb_show_articles = data.cb_show_articles;
        this._bt_save = data.bt_save;
    }

    get cb_enable_page(){ return this._cb_enable_page; }
    get cb_enable_image(){ return this._cb_enable_image; }
    get div_image_section(){ return this._div_image_section; }
    get input_file_image(){ return this._input_file_image; }
    get input_image_path(){ return this._input_image_path; }
    get cb_enable_text(){ return this._cb_enable_text; }
    get div_text_section(){ return this._div_text_section; }
    get ta_text(){ return this._ta_text; }
    get cb_show_articles(){ return this._cb_show_articles; }
    get bt_save(){ return this._bt_save; }

    /**
     * Add listeners to HTML elements
     * @param onSaveButtonClick callback when settings save button has been clicked
     */
    public addEvents(onSaveButtonClick: (acpust: AdminCustomPageUpdateSettingsType) => void){
        this.setEnablePageEvent();
        this.setEnableImageEvent();
        this.setEnableTextEvent();
        this.setSaveButtonEvent(onSaveButtonClick)
    }

    private setEnablePageEvent(): void{
        this._cb_enable_page.on('change',()=>{
            if(this._cb_enable_page.is(':checked')){
                this._cb_enable_image.prop('disabled',false)
                this._cb_enable_text.prop('disabled',false)
                this._cb_show_articles.prop('disabled',false);
            }
            else{
                this._cb_enable_image.prop('disabled',true)
                this._cb_enable_text.prop('disabled',true)
                this._cb_show_articles.prop('disabled',true);
            }
        })
    }

    private setEnableImageEvent(): void{
        this._cb_enable_image.on('change',()=>{
            if(this._cb_enable_image.is(':checked')){
                if(this._div_image_section.hasClass('d-none'))
                    this._div_image_section.removeClass('d-none')
            }
            else{
                if(!this._div_image_section.hasClass('d-none'))
                        this._div_image_section.addClass('d-none')
            }
        })
    }

    private setEnableTextEvent(): void{
        this._cb_enable_text.on('change',()=>{
            if(this._cb_enable_text.is(':checked')){
                if(this._div_text_section.hasClass('d-none'))
                    this._div_text_section.removeClass('d-none')
            }
            else{
                if(!this._div_text_section.hasClass('d-none'))
                    this._div_text_section.addClass('d-none')
            }
        })
    }

    private setSaveButtonEvent(callback: (acpust: AdminCustomPageUpdateSettingsType) => void): void{
        this._bt_save.on('click',()=>{
            const native_input: HTMLInputElement = this._input_file_image.get(0) as HTMLInputElement;
            let file: File|undefined = undefined;
            if(native_input && native_input.files && native_input.files.length > 0){
                file = native_input.files[0] as File;
            }
            const acpustType: AdminCustomPageUpdateSettingsType = {
                enable_page: this._cb_enable_page.val() as string,
                enable_image: this._cb_enable_image.val() as string,
                image_path: this._input_image_path.val() as string,
                enable_text: this._cb_enable_text.val() as string,
                text: this._ta_text.val() as string,
                show_articles: this._cb_show_articles.val() as string

            }
            callback(acpustType);
        })
    }
}