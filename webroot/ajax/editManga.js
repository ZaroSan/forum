function ajouter() {
	// on prend toutes les données de notre formulaire directement
	console.log('test');
	const donnees = new FormData(formulaireAjout);
	fetch('/forum/indexAjax.php', {
		method: 'POST',
		body: donnees
	})
	.then(r => r.json())
	.then(r => {
		// on regarde s'il y a eu des erreurs
		if (r.erreurs.length === 0) {
			//erreursAjout.innerHTML = '';
			formulaireAjout.reset(); // on vide le formulaire
			//afficher_liste();		// on affiche la liste	
			// on théorie on devrait ajouter l'élèment à la liste mais pour faire plus court, on reload:
			//charger_liste();
		} 
		else {
			// on affiche les erreurs
			//erreursAjout.innerHTML = 
				/*'<div class="notification content is-danger"><ul>' +
					r.erreurs.map(e => `<li>${e}</li>`).join('') +
				'</ul></div>';*/
		}
	})
	.catch(e => {
		//erreursAjout.innerHTML = `<div class="notification is-danger">Une erreur est survenue.</div>`;
	});
}