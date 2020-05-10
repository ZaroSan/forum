function post(controller,action) {
	const donnees = new FormData(formulaireAjout);
	fetch('/forum/indexAjax.php?controller='+controller+'&action='+action, {
		method: 'POST',
		body: donnees
	})
	.then(r => r.json())
	.then(r => {})
	.catch(e => {});
	formulaireAjout.reset();
	
}

