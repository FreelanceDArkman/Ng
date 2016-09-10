var CKFinder = function( basePath, width, height, selectFunction )
{
	this.BasePath = basePath || CKFinder.DEFAULT_BASEPATH ;
	this.Width	= width || '100%' ;
	this.Height	= height || 400 ;
	this.SelectFunction = selectFunction || null ;
	this.SelectFunctionData = null ;
	this.SelectThumbnailFunction = selectFunction || null ;
	this.SelectThumbnailFunctionData = null ;
	this.DisableThumbnailSelection = false ;
	this.ClassName = null || 'CKFinderFrame' ;
	this.StartupPath = null ;
	this.StartupFolderExpanded = false ;
	this.RememberLastFolder = true ;
	this.Id = null ;
	this.ConnectorLanguage = 'php' ;
}

CKFinder.DEFAULT_BASEPATH = '/ckfinder/' ;
CKFinder.prototype = {
	Create : function()
	{
		document.write( this.CreateHtml() ) ;
	},
	CreateHtml : function()
	{
		var className = this.ClassName ;
		if ( className && className.length > 0 )
			className = ' class="' + className + '"' ;

		var id = this.Id ;
		if ( id && id.length > 0 )
			id = ' id="' + id + '"' ;
			
		return '<iframe src="' + this._BuildUrl() + '" width="' + this.Width + '" ' +
			'height="' + this.Height + '"' + className + id + ' frameborder="0" scrolling="no"></iframe>' ;
	},
	Popup : function( width, height )
	{
		width = width || '80%' ;
		height = height || '70%' ;

		if ( typeof width == 'string' && width.length > 1 && width.substr( width.length - 1, 1 ) == '%' )
			width = parseInt( window.screen.width * parseInt( width ) / 100 ) ;

		if ( typeof height == 'string' && height.length > 1 && height.substr( height.length - 1, 1 ) == '%' )
			height = parseInt( window.screen.height * parseInt( height ) / 100 ) ;

		if ( width < 200 )
			width = 200 ;

		if ( height < 200 )
			height = 200 ;

		var top = parseInt( ( window.screen.height - height ) / 2 ) ;
		var left = parseInt( ( window.screen.width  - width ) / 2 ) ;

		var options = 'location=no,menubar=no,toolbar=no,dependent=yes,minimizable=no,modal=yes,alwaysRaised=yes,resizable=yes' +
			',width='  + width +
			',height=' + height +
			',top='  + top +
			',left=' + left ;

		var popupWindow = window.open( '', 'CKFinderPopup', options, true ) ;
		if ( !popupWindow )
			return false ;

		var url = this._BuildUrl().replace(/&amp;/g, '&');
		try
		{
			popupWindow.moveTo( left, top ) ;
			popupWindow.resizeTo( width, height ) ;
			popupWindow.focus() ;
			popupWindow.location.href = url ;
		}
		catch (e)
		{
			popupWindow = window.open( url, 'CKFinderPopup', options, true ) ;
		}

		return true ;
	},

	_BuildUrl : function( url )
	{
		var url = url || this.BasePath ;
		var qs = "" ;

		if ( !url || url.length == 0 )
			url = CKFinder.DEFAULT_BASEPATH ;

		if ( url.substr( url.length - 1, 1 ) != '/' )
			url = url + '/' ;

		url += 'ckfinder.html' ;

		if ( this.SelectFunction )
		{
			var functionName = this.SelectFunction ;
			if ( typeof functionName == 'function' )
				functionName = functionName.toString().match( /function ([^(]+)/ )[1] ;

			qs += '?action=js&amp;func=' + functionName ;
		}

		if ( this.SelectFunctionData )
		{
			qs += qs ? '&amp;' : '?' ;
			qs += 'data=' + encodeURIComponent( this.SelectFunctionData ) ;
		}

		if ( this.DisableThumbnailSelection )
		{
			qs += qs ? "&amp;" : "?" ;
			qs += 'dts=1' ;
		}
		else if ( this.SelectThumbnailFunction || this.SelectFunction )
		{
			var functionName = this.SelectThumbnailFunction || this.SelectFunction ;
			if ( typeof functionName == 'function' )
				functionName = functionName.toString().match( /function ([^(]+)/ )[1] ;

			qs += qs ? "&amp;" : "?" ;
			qs += 'thumbFunc=' + functionName ;
			
			if ( this.SelectThumbnailFunctionData )
				qs += '&amp;tdata=' + encodeURIComponent( this.SelectThumbnailFunctionData ) ;
			else if ( !this.SelectThumbnailFunction && this.SelectFunctionData )
				qs += '&amp;tdata=' + encodeURIComponent( this.SelectFunctionData ) ;
		}

		if ( this.StartupPath )
		{
			qs += qs ? "&amp;" : "?" ;
			qs += "start=" + encodeURIComponent( this.StartupPath + ( this.StartupFolderExpanded ? ':1' : ':0' ) ) ;
		}

		if ( !this.RememberLastFolder )
		{
			qs += qs ? "&amp;" : "?" ;
			qs += "rlf=0" ;
		}

		if ( this.Id )
		{
			qs += qs ? "&amp;" : "?" ;
			qs += "id=" + encodeURIComponent( this.Id ) ;
		}
		
		return url + qs ;
	}

} ;
CKFinder.Create = function( basePath, width, height, selectFunction )
{
	var ckfinder ;
	
	if ( basePath != null && typeof( basePath ) == 'object' )
	{
		ckfinder = new CKFinder( ) ;
		for ( var _property in basePath )
			ckfinder[_property] = basePath[_property] ;
	}
	else
		ckfinder = new CKFinder( basePath, width, height, selectFunction ) ;

	ckfinder.Create() ;
}
CKFinder.Popup = function( basePath, width, height, selectFunction )
{
	var ckfinder ;
	
	if ( basePath != null && typeof( basePath ) == 'object' )
	{
		ckfinder = new CKFinder( ) ;
		for ( var _property in basePath )
			ckfinder[_property] = basePath[_property] ;
	}
	else
		ckfinder = new CKFinder( basePath, width, height, selectFunction ) ;

	ckfinder.Popup( width, height ) ;
}
CKFinder.SetupFCKeditor = function( editorObj, basePath, imageType, flashType )
{
	var ckfinder ;

	if ( basePath != null && typeof( basePath ) == 'object' )
	{
		ckfinder = new CKFinder( ) ;
		for ( var _property in basePath )
		{
			ckfinder[_property] = basePath[_property] ;
			
			if ( _property == 'Width' )
			{
				var width = ckfinder[_property] || 800 ;
				if ( typeof width == 'string' && width.length > 1 && width.substr( width.length - 1, 1 ) == '%' )
					width = parseInt( window.screen.width * parseInt( width ) / 100 ) ;

				editorObj.Config['LinkBrowserWindowWidth'] = width ;
				editorObj.Config['ImageBrowserWindowWidth'] = width ;
				editorObj.Config['FlashBrowserWindowWidth'] = width ;
			}
			else if ( _property == 'Height' )
			{
				var height = ckfinder[_property] || 600 ;
				if ( typeof height == 'string' && height.length > 1 && height.substr( height.length - 1, 1 ) == '%' )
					height = parseInt( window.screen.height * parseInt( height ) / 100 ) ;

				editorObj.Config['LinkBrowserWindowHeight'] = height ;
				editorObj.Config['ImageBrowserWindowHeight'] = height ;
				editorObj.Config['FlashBrowserWindowHeight'] = height ;
			}
		}
	}
	else
		ckfinder = new CKFinder( basePath ) ;

	var url = ckfinder.BasePath ;
	if ( url.substr( 0, 1 ) != '/' )
		url = document.location.pathname.substring( 0, document.location.pathname.lastIndexOf('/') + 1 ) + url ;

	url = ckfinder._BuildUrl( url ) ;
	var qs = ( url.indexOf( "?" ) !== -1 ) ? "&amp;" : "?" ;

	editorObj.Config['LinkBrowserURL'] = url ;
	editorObj.Config['ImageBrowserURL'] = url + qs + 'type=' + ( imageType || 'Images' ) ;
	editorObj.Config['FlashBrowserURL'] = url + qs + 'type=' + ( flashType || 'Flash' ) ;

	var dir = url.substring(0, 1 + url.lastIndexOf("/"));
	editorObj.Config['LinkUploadURL'] = dir + "core/connector/" + ckfinder.ConnectorLanguage + "/connector." 
		+ ckfinder.ConnectorLanguage + "?command=QuickUpload&type=Files" ;
	editorObj.Config['ImageUploadURL'] = dir + "core/connector/" + ckfinder.ConnectorLanguage + "/connector." 
		+ ckfinder.ConnectorLanguage + "?command=QuickUpload&type=" + ( imageType || 'Images' ) ;
	editorObj.Config['FlashUploadURL'] = dir + "core/connector/" + ckfinder.ConnectorLanguage + "/connector." 
		+ ckfinder.ConnectorLanguage + "?command=QuickUpload&type=" + ( flashType || 'Flash' ) ;
}
CKFinder.SetupCKEditor = function( editorObj, basePath, imageType, flashType )
{
	var ckfinder ;

	if ( basePath != null && typeof( basePath ) == 'object' )
	{
		ckfinder = new CKFinder( ) ;
		for ( var _property in basePath )
		{
			ckfinder[_property] = basePath[_property] ;	

			if ( _property == 'Width' )
			{
				var width = ckfinder[_property] || 800 ;
				if ( typeof width == 'string' && width.length > 1 && width.substr( width.length - 1, 1 ) == '%' )
					width = parseInt( window.screen.width * parseInt( width ) / 100 ) ;

				editorObj.config.filebrowserWindowWidth = width ;
			}
			else if ( _property == 'Height' )
			{
				var height = ckfinder[_property] || 600 ;
				if ( typeof height == 'string' && height.length > 1 && height.substr( height.length - 1, 1 ) == '%' )
					height = parseInt( window.screen.height * parseInt( height ) / 100 ) ;

				editorObj.config.filebrowserWindowHeight = width ;
			}
		}
	}
	else
		ckfinder = new CKFinder( basePath ) ;

	var url = ckfinder.BasePath ;
	if ( url.substr( 0, 1 ) != '/' )
		url = document.location.pathname.substring( 0, document.location.pathname.lastIndexOf('/') + 1 ) + url ;

	url = ckfinder._BuildUrl( url ) ;
	var qs = ( url.indexOf( "?" ) !== -1 ) ? "&amp;" : "?" ;

	editorObj.config.filebrowserBrowseUrl = url ;
	editorObj.config.filebrowserImageBrowseUrl = url + qs + 'type=' + ( imageType || 'Images' ) ;
	editorObj.config.filebrowserFlashBrowseUrl = url + qs + 'type=' + ( flashType || 'Flash' ) ;

	var dir = url.substring(0, 1 + url.lastIndexOf("/"));
	editorObj.config.filebrowserUploadUrl = dir + "core/connector/" + ckfinder.ConnectorLanguage + "/connector." 
		+ ckfinder.ConnectorLanguage + "?command=QuickUpload&type=Files" ;
	editorObj.config.filebrowserImageUploadUrl = dir + "core/connector/" + ckfinder.ConnectorLanguage + "/connector." 
		+ ckfinder.ConnectorLanguage + "?command=QuickUpload&type=" + ( imageType || 'Images' ) ;
	editorObj.config.filebrowserFlashUploadUrl = dir + "core/connector/" + ckfinder.ConnectorLanguage + "/connector." 
		+ ckfinder.ConnectorLanguage + "?command=QuickUpload&type=" + ( flashType || 'Flash' ) ;
}
