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
    private _errno: number = 0;
    private _error: string|null = null;

    private static UPDATESETTINGS_URL:string = "";

    public static ERR_FETCH: number = 1;
    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta.";


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
                msg: this.error
            }
        }
        return response;
    }

    private async updateSettingsPromise(): Promise<string>{
        return await new Promise<string>((resolve, reject) => {
            const fa: FormData = new FormData();
            fa.append('enable_page',this._enable_page as unknown as string);
            fa.append('enable_image',this._enable_image as unknown as string);
            fa.append('file_image',this._file_image);
            fa.append('enable_text',this._enable_text as unknown as string);
            fa.append('show_articles',this._show_articles as unknown as string);
            fetch(AdminCustomPageUpdateSettings.UPDATESETTINGS_URL,{
                method: 'POST',
                body: fa,
            }).then(res => resolve(res.text())).catch(err => reject(err))
        })
    }

}