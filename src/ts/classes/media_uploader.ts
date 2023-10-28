import { MediaUploaderType } from "../types/types";

/**
 * Display the Wordpress media uploader
 */
export class MediaUploader{
    private _button_uploader: JQuery<HTMLButtonElement>;
    private _image_url: JQuery<HTMLDivElement>;

    constructor(data: MediaUploaderType){
        this._button_uploader = data.button_uploader;
        this._image_url = data.image_url;
    }

    get button_uploader(){ return this._button_uploader; }
    get image_url(){ return this._image_url; }
}