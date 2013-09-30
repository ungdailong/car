// Javascript code 
$(document).ready(function() {
						   
	// Navigation
	$('.nav').superfish({
		hoverClass	 : 'sfHover',
		pathClass	 : 'overideThisToUse',
		delay		 : 0,
		animation	 : {height: 'show'},
		speed		 : 'normal',
		autoArrows   : false,
		dropShadows  : false, 
		disableHI	 : false, /* set to true to disable hoverIntent detection */
		onInit		 : function(){},
		onBeforeShow : function(){},
		onShow		 : function(){},
		onHide		 : function(){}
	});
	$('.nav').css('display', 'block');
	
});

// Javascript for TBL
var tbl = {

	// Editor
	editor: function(id) {
		tinyMCE.init({
			mode : "exact",
			elements : id,
			theme : "advanced",
			plugins : "style,table,advimage,advlink,insertdatetime,preview,flash,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,imagemanager,safari,layer,media,advhr,emotions,iespell,preview,xhtmlxtras,inlinepopups",
			theme_advanced_buttons1_add_before : "save,newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,separator,forecolor,backcolor",
			theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
			theme_advanced_buttons3_add_before : "tablecontrols,separator",
			theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
			theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,teaser",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_path_location : "bottom",
			plugin_insertdate_dateFormat : "%Y-%m-%d",
			plugin_insertdate_timeFormat : "%H:%M:%S",
			extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			file_browser_callback : "ajaxfilemanager",
			theme_advanced_resize_horizontal : false,
			theme_advanced_resizing : true
		});
	},
	
	// Action
	deleted: function(href, title) {
		if(confirm(title)) {
			//document.myform.action = href;
			document.form2.submit();
			return true;
		}
		else {
			return false;
		}
	},	
	
	
	
	button: function(href) {
		document.myform.action = href;
		document.myform.submit();
		return true;
	}
	
}
///Load ajax type
function remove1(href,title)
{
	if(confirm(title)) {
			document.form2.action = href;
			document.form2.submit();
			return true;
		}
		else {
			return false;
		}
}
function countDownload()
{
	var url = "count";
	var id ="ee";
	var effect = 2;
	$('#'+id).html(''); 
	$('#'+id).addClass('loading');
	 
	$(document).ready(function() {	
		$.ajax({
			type: "GET",
			url:"ajax1.php",
			//data:url,
			
			success: function(msg){
				 
				$('#'+id).removeClass('loading');				
				$('#'+id).hide();
				$('#'+id).html(msg); 
				if(effect==2)
					$('#'+id).slideDown("slow");
				else
					$('#'+id).fadeIn("slow");
			}
		});	alert("Mời bạn download");
	})
	 
}
//End load ajax
///login submit
function loginSubmit(){
	if(document.getElementById('username').value==""){
		document.getElementById('username').style.background="#FFFFCC";
		document.getElementById('username').focus();
		return false;
	}
	if(document.getElementById('password').value==""){
		document.getElementById('password').style.background="#FFFFCC";
		document.getElementById('password').focus();
		return false;
	}else{
		$('#myform').submit();
	}
}
//submit admin form list
function submitAdmin(){
	document.form2.action="subsite";
	document.form2.submit();
}
//submit upload
function submitUpload(page){
	var order_number=document.getElementById('order_number').value;
	var filmid=document.getElementById('filmid').value;
	var videofile=document.getElementById('videofile').value;
	var dataString = 'order_number='+ order_number +'&filmid='+filmid+'&videofile='+videofile;	
	
	$(function() {
		$(".button").click(function() {
			var order_number = $("input#order_number").val();  
			if (order_number == "") {  
				$("input#order_number").style.background="#FFFFCC";
				$("input#order_number").focus();  
				return false;  
			}  
		});
	});
	
	$.ajax({
		type: "POST",
		url: "ajax.php?p="+page,
		data: dataString,
		success: function(msg) {
			$('.content').html(msg);					
		}
	});
	return false;	
}
//delete video
function deleteVideo(page,id,filmid){	
	var dataString = "id="+id+'&filmid='+filmid;	
	$.ajax({
		type: "GET",
		url: "ajax.php?p="+page,
		data: dataString,
		success: function(msg) {
			$('.content').html(msg);					
		}
	});
	return false;		
}
