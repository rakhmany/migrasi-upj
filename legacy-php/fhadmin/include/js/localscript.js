$(document).ready(function(){
	$("textarea.jckeditor").ckeditor(
	function() {
		/* callback code */
		CKFinder.setupCKEditor( this, "../../lib/ckfinder" );
	},
	{
		skin : 'moonocolor', 
		languages : {
			'en' : 1,
			'zh' : 1,
			'zh-cn' : 1
		} , 
		language : "en"
	}
	);
});