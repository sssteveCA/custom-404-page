
<div>
    <h1>Custom 404 page</h1><br><br>
    This plugin allows you to set a custom 404 page in your Wordpress website.
</div>
<div>
    You need <a href="https://nodejs.org/en/download">NodeJs</a> and <a href="https://nodejs.org/en/download">Composer</a> to compile your sources.<br><br>
</div>
<div>
    Next run from your terminal:<br>
    <ul>
        <li><b>npm i</b></li>
        <li><b>composer install</b></li>
        <li><b>npm run dev</b></li>
    </ul>  
</div>
<div>
    <br><br>
    If you want use this plugin in production:<br>
    <ul>
       <li><b>npm i --omit=dev</b></li>
       <li><b>composer install --optmize=autoloader --no-dev</b></li>
       <li><b>npm run build</b></li>
       <li>Create the .zip archive with this command: <b>zip -r classes dist exceptions interfaces node_modules scripts templates traits vendor custom_404_page.php</b></li>
       <li>Install the plugin uploading the created zip file</li>
    </ul>
</div>
<br><br>
<a href="https://github.com/sssteveCA/custom-404-page/assets/95185311/ae2cc847-5cb6-4819-806e-33bc86aa240f">Demo video</a>
