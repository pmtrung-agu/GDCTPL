/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	var APP_URL = 'http://172.19.49.68:8000/';
    config.allowedContent = true;
    config.removeFormatAttributes = '';
	config.contentsCss = [
		'https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap',
        APP_URL + 'assets/frontend/css/bootstrap.min.css',
        APP_URL + 'assets/frontend/css/fontawesome.min.css',
        APP_URL + 'assets/frontend/css/magnific-popup.min.css',
        APP_URL + 'assets/frontend/css/swiper-bundle.min.css',
        APP_URL + 'assets/frontend/css/style.css',
        APP_URL + 'assets/frontend/css/ckeditor.css'
	];
};
