
/**
 * List of constants commonly used
 */
export namespace Constants{
    export const KEY_DONE: string = 'done'
    export const KEY_MESSAGE: string = 'message'
    export const PLUGIN_DIR: string = '/wp-content/plugins/custom_404_page'
    export const SCRIPT_DIR: string = '/scripts'

    /**
     * @returns URL of PHP scripts to which HTTP requests are made
     */
    export function scriptPath(): string{
        return PLUGIN_DIR+SCRIPT_DIR;
    }
}