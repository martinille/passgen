"use strict";


const copytoclipboard = () => {
	const text = $("#password").val();
	clipboard.copy(text);
	$("#copy,#ok").toggle();
	setTimeout(()=>{
		$("#copy,#ok").toggle();
	},3000);
};


$(function(){




});
