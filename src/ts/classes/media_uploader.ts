import { MediaUploaderType } from "../types/types";

/**
 * Display the Wordpress media uploader and choose the image for custom 404 page
 */
export class MediaUploader{

    private _input_file: JQuery<HTMLInputElement>;
    private _input_image_path: JQuery<HTMLInputElement>;
    private _image_url_div: JQuery<HTMLDivElement>;
    /**
     * An instance of the Wordpress Media Uploader
     */
    private _media_uploader_ref: any;

    constructor(data: MediaUploaderType){
        this._input_file = data.input_file;
        this._input_image_path = data.input_image_path;
        this._image_url_div = data.image_url_div;
        this.mediaUploaderOpen()
    }

    get input_file(){ return this._input_file; }
    get input_image_path(){ return this._input_image_path; }
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
                    this._input_image_path.val(attachment.url)
                    this._image_url_div.html("Percorso immagine: "+attachment.url);
                })
                this._media_uploader_ref.open()
            }

        })
    }
}