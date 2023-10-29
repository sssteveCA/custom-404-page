import { Constants } from "../namespace/constants";
import { AdminCustomPageUpdateSettingsType } from "../types/types";

/**
 * Update ccustom 404 page settings class
 */
export class AdminCustomPageUpdateSettings{

    private _enable_page: string;
    private _enable_image: string;
    private _image_path: string;
    private _enable_text: string;
    private _text: string;
    private _show_articles: string;
    private _errno: number = 0;
    private _error: string|null = null;

    private static UPDATESETTINGS_URL:string = Constants.SCRIPT_DIR+'/update_settings_script.php';

    public static ERR_FETCH: number = 1;
    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta.";


    constructor(data: AdminCustomPageUpdateSettingsType){
        this._enable_page = data.enable_page;
        this._enable_image = data.enable_image;
        this._image_path = data.image_path;
        this._enable_text = data.enable_text;
        this._text = data.text;
        this._show_articles = data.show_articles;
    }

    get enable_page(){ return this._enable_page; }
    get enable_image(){ return this._enable_image; }
    get image_path(){ return this._image_path; }
    get enable_text(){ return this._enable_text; }
    get text(){ return this._text; }
    get show_articles(){ return this._show_articles; }
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
     * Execute the request to update the settings
     */
    public async updateSettings(): Promise<object>{
        let response: object = {}
        this._errno = 0;
        try{
            await this.updateSettingsPromise().then(res => {
                response = JSON.parse(res)
            }).catch(err => {
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
                'enable_page': this._enable_page,
                'enable_image': this._enable_image,
                'image_path': this._image_path,
                'enable_text': this._enable_text,
                'text': this._text,
                'show_articles': this._show_articles
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