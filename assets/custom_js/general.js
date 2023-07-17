const copytoclipboard = () => {
	const text = $("#password").val();
	clipboard.copy(text);
	$("#copy,#ok").toggle();
};

