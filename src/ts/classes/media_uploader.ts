import { MediaUploaderType } from "../types/types";

/**
 * Display the Wordpress media uploader
 */
export class MediaUploader{
    private _input_file: JQuery<HTMLInputElement>;
    private _image_url_div: JQuery<HTMLDivElement>;
    private _media_uploader_ref: any;

    constructor(data: MediaUploaderType){
        this._input_file = data.input_file;
        this._image_url_div = data.image_url_div;
        this.mediaUploaderOpen()
    }

    get input_file(){ return this._input_file; }
    get image_url_div(){ return this._image_url_div; }

    /**
     * Open the Worpdress Media Upload on button click if exists
     */
    private mediaUploaderOpen(){
        this._input_file.on('click',(e)=>{
            e.preventDefault();
            if(this._media_uploader_ref)
                this._media_uploader_ref.open()
            else{
                this._media_uploader_ref = wp.media({
                    title: "Scegli un'immagine",
                    button: {
                        text: "SCEGLI"
                    },
                    multiple: false,
                })
                this._media_uploader_ref.on('select',()=>{
                    const attachment = this._media_uploader_ref.state().get('selection').first().toJSON()
                    this._image_url_div.html("Percorso immagine: "+attachment.url);
                })
                this._media_uploader_ref.open()
            }

        })
    }
}