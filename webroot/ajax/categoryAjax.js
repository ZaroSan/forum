function reloadListAdmin(){
	
	var url='/forum/indexAjax.php?controller=Category&action=admin_indexAjax';
	

	fetch(url)
	.then(r => r.json())
	.then(r => {
		document.getElementById('total').innerText=r.total + ' Catégories';
		if (r.category.length > 0) {
			liste.innerHTML = '';
			for (let data of r.category) {
				const ligne = liste.insertRow();
				ligne.dataset.id = data.id;
				ligne.insertCell().innerText = data.id;
				
				ligne.insertCell().innerText = data.name;
				ligne.insertCell().innerHTML = `
					<div class="btn-group">
						<a 
							class="btn btn-outline-danger" 
							style="color:red"
							onclick="remove(${data.id})">Supprimer</a>
					</div>
				`;
				
			}
		}
		else{
			liste.innerText='';
		}
	})
	.catch(e => {});
}
function remove(id){
	if(!confirm("Voulez-vous vraiment supprimer cet élément")){
		return;
	}
	const ligne = document.querySelector(`tr[data-id='${id}']`);
	if (ligne) {
		const donnees = new FormData;
		donnees.append('id', id);
		fetch('/forum/indexAjax.php?controller=Category&action=admin_deleteAjax', {
			method: 'POST',							  
			body: donnees
		}).then(() => ligne.remove());
	}
}
function postCategory() {
	const donnees = new FormData(formulaireAjout);
	fetch('/forum/indexAjax.php?controller=Category&action=admin_edit', {
		method: 'POST',
		body: donnees
	})
	.then(r => r.json())
	.then(r => {
		
	})
	.catch(e => {});
	formulaireAjout.reset();
	
	setTimeout(reloadListAdmin, 3000);
	
}