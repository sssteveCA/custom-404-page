import { Constants } from "../namespace/constants";
import { AdminCustomPageUpdateSettingsType } from "../types/types";

/**
 * Update custom 404 page settings class
 */
export class AdminCustomPageUpdateSettings{

    private _enable_custom_404_page: string;
    private _use_title: string;
    private _title: string;
    private _use_image: string;
    private _image_path: string;
    private _use_text: string;
    private _text: string;
    private _show_articles: string;
    private _post_image_path: string;
    private _errno: number = 0;
    private _error: string|null = null;
	
    private static UPDATESETTINGS_URL:string = Constants.scriptPath()+'/update_settings_script.php';
    public static ERR_FETCH: number = 1;
    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta.";


    constructor(data: AdminCustomPageUpdateSettingsType){
        this._enable_custom_404_page = data.enable_custom_404_page;
        this._use_title = data.use_title;
        this._title = data.title;
        this._use_image = data.use_image;
        this._image_path = data.image_path;
        this._use_text = data.use_text;
        this._text = data.text;
        this._show_articles = data.show_articles;
        this._post_image_path = data.post_image_path;
    }

    get enable_custom_404_page(){ return this._enable_custom_404_page; }
    get use_title(){ return this._use_title; }
    get title(){ return this._title; }
    get use_image(){ return this._use_image; }
    get image_path(){ return this._image_path; }
    get use_text(){ return this._use_text; }
    get text(){ return this._text; }
    get show_articles(){ return this._show_articles; }
    get post_image_path(){ return this._post_image_path; }
    get errno(){ return this._errno; }
    get error(){
        switch(this._errno){
            case AdminCustomPageUpdateSettings.ERR_FETCH:
                this._error = AdminCustomPageUpdateSettings.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    /**
     * Execute HTTP the request to update the settings
     */
    public async updateSettings(): Promise<object>{
        let response: object = {}
        this._errno = 0;
        try{
            await this.updateSettingsPromise().then(res => {
                //console.log(res)
                response = JSON.parse(res)
                
            }).catch(err => {
                console.warn(err)
                throw err;
            })
        }catch(e){
            this._errno = AdminCustomPageUpdateSettings.ERR_FETCH;
            response = {
                done: false,
                message: this.error
            }
        }
        return response;
    }

    private async updateSettingsPromise(): Promise<string>{
        return await new Promise<string>((resolve, reject) => {
            const data: object = {
                'enable_custom_404_page': this._enable_custom_404_page,
                'use_title': this._use_title,
                'title': this._title,
                'use_image': this._use_image,
                'image_path': this._image_path,
                'use_text': this._use_text,
                'text': this._text,
                'show_articles': this._show_articles,
                'post_image_path': this._post_image_path
            }
            fetch(AdminCustomPageUpdateSettings.UPDATESETTINGS_URL,{
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data),
            }).then(res => resolve(res.text())).catch(err => reject(err))
        })
    }

}