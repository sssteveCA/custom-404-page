import { PostMediaUploaderType } from "../types/types";

/**
 * Display the Wordpress media uploader
 */
export class PostMediaUploader{
    private _input_file_post: JQuery<HTMLInputElement>;
    private _input_post_image_path: JQuery<HTMLInputElement>;
    private _post_image_url_div: JQuery<HTMLDivElement>;
    private _media_uploader_ref: any;

    constructor(data: PostMediaUploaderType){
        this._input_file_post = data.input_file_post;
        this._input_post_image_path = data.input_post_image_path;
        this._post_image_url_div = data.post_image_url_div;
        this.mediaUploaderOpen()
    }

    get input_file_post(){ return this._input_file_post; }
    get input_post_image_path(){ return this._input_post_image_path; }
    get post_image_url_div(){ return this._post_image_url_div; }

    /**
     * Open the Worpdress Media Upload on button click if exists
     */
    private mediaUploaderOpen(){
        this._input_file_post.on('click',(e)=>{
            e.preventDefault();
            if(this._media_uploader_ref)
                this._media_uploader_ref.open()
            else{
                this._media_uploader_ref = wp.media({
                    title: "Scegli miniatura",
                    button: {
                        text: "SCEGLI"
                    },
                    multiple: false,
                })
                this._media_uploader_ref.on('select',()=>{
                    const attachment = this._media_uploader_ref.state().get('selection').first().toJSON()
                    this._input_post_image_path.val(attachment.url)
                    this._post_image_url_div.html("Percorso miniatura: "+attachment.url);
                })
                this._media_uploader_ref.open()
            }

        })
    }
}