import { AdminCustomPageUpdateSettingsType } from "../types/types";

/**
 * Update ccustom 404 page settings class
 */
export class AdminCustomPageUpdateSettings{

    private _enable_page: boolean;
    private _enable_image: boolean;
    private _file_image: File;
    private _enable_text: boolean;
    private _text: string;
    private _show_articles: boolean;

    constructor(data: AdminCustomPageUpdateSettingsType){
        this._enable_page = data.enable_page;
        this._enable_image = data.enable_image;
        this._file_image = data.file_image;
        this._enable_text = data.enable_text;
        this._text = data.text;
        this._show_articles = data.show_articles;
    }

    get enable_page(){ return this._enable_page; }
    get enable_image(){ return this._enable_image; }
    get file_image(){ return this._file_image; }
    get enable_text(){ return this._enable_text; }
    get text(){ return this._text; }
    get show_articles(){ return this._show_articles; }

}