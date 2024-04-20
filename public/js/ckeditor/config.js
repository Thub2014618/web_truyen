/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	config.uiColor = '#D7D8D7';
	config.height = 500;
	config.removePlugins = 'elementspath';
	config.resize_enabled = false;
    config.shiftEnterMode = CKEDITOR.ENTER_BR;
	config.enterMode = CKEDITOR.ENTER_BR;
	config.toolbarGroups = [];
	//config.editorplaceholder = 'Nhập nội dung';
	config.font_defaultLabel = 'Arial';
	config.fontSize_defaultLabel = '16px';
};