/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    //添加插件，多个插件用逗号隔开
    config.extraPlugins = 'clipboard,lineutils,widget,dialog,codesnippet';
    //使用zenburn的代码高亮风格样式 PS:zenburn效果就是黑色背景
    //如果不设置着默认风格为default
    codeSnippet_theme: 'zenburn';
    config.image_previewText=' '
    // editorIndicates whether the contents to be edited are being input as a full HTML page.
    // A full page includes the <html>, <head>, and <body> elements.
    // The final output will also reflect this setting, including the <body> contents only if this setting is disabled.
    config.fullPage= true;
   // config.defaultValue=false;
    // set editor html no display auto filter
   // config.allowedContent= true;
    //config.filebrowserImageUploadUrl ='{{url(\'articles/image\')}}';
};
