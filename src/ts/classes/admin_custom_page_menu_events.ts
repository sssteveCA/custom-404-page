import { AdminCustomPageMenuEventsType } from "../types/types";

export class AdminCustomPageMenuEvents{

    private _cb_enable_page: HTMLInputElement;
    private _cb_enable_image: HTMLInputElement;
    private _input_file_image: HTMLInputElement;
    private _cb_enable_text: HTMLInputElement;
    private _ta_text: HTMLTextAreaElement;
    private _cb_show_articles: HTMLInputElement;

    constructor(data: AdminCustomPageMenuEventsType){
        this._cb_enable_page = data.cb_enable_page;
        this._cb_enable_image = data.cb_enable_image;
        this._input_file_image = data.input_file_image;
        this._cb_enable_text = data.cb_enable_text;
        this._ta_text = data.ta_text;
        this._cb_show_articles = data.cb_show_articles;
    }

    get cb_enable_page(){ return this._cb_enable_page; }
    get cb_enable_image(){ return this._cb_enable_image; }
    get input_file_image(){ return this._input_file_image; }
    get cb_enable_text(){ return this._cb_enable_text; }
    get ta_text(){ return this._ta_text; }
    get cb_show_articles(){ return this._cb_show_articles; }
}