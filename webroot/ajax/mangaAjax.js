window.onload = function() {
	reloadList();
}
function reloadList(){
	fetch('/forum/indexAjax.php?controller=Manga&action=admin_indexAjax')
	.then(r => r.json())
	.then(r => {
		if (r.list.length > 0) {
			liste.innerHTML = '';
			for (let data of r.list) {
				const ligne = liste.insertRow();
				ligne.dataset.id = data.id;
				ligne.insertCell().innerText = data.id;

				if(data.online==1){
					ligne.insertCell().innerHTML=`<a  onclick="toggleOnline(${data.id})" class="btn btn-success" style="color:white">En ligne</a>`;
				}
				else{
					ligne.insertCell().innerHTML=`<a  onclick="toggleOnline(${data.id})"class="btn btn-warning">Hors ligne</a>`;
				}
				
				ligne.insertCell().innerHTML = `
					<strong><a href="../../manga/${data.slug}-${data.id}" class="manga-link">${data.name}</a></strong>
				`;
				ligne.insertCell().innerText = data.slug;
				ligne.insertCell().innerHTML = `
					<div class="btn-group">
						<a class="btn btn-outline-success" href="edit/${data.id}">Editer</a>
						<a 
							class="btn btn-outline-danger" 
							style="color:red"
							onclick="remove(${data.id})">Supprimer</a>
					</div>
				`;
			}

		}
	})
	.catch(e => {});
}
function remove(id){
	if(!confirm("Voulez-vous vraiment supprimer cet élément")){
		return;
	}
	const ligne = document.querySelector(`tr[data-id='${id}']`);
	console.log(ligne);
	if (ligne) {
		const donnees = new FormData;
		donnees.append('id', id);
		fetch('/forum/indexAjax.php?controller=Manga&action=admin_deleteAjax', {
			method: 'POST',							  
			body: donnees
		}).then(() => ligne.remove());
	}
}
function toggleOnline(id){

	const ligne = document.querySelector(`tr[data-id='${id}']`);
	console.log(ligne);
	if (ligne) {
		const donnees = new FormData;
		donnees.append('id', id);
		fetch('/forum/indexAjax.php?controller=Manga&action=admin_toggleOnlineAjax', {
			method: 'POST',							  
			body: donnees
		}).then(() =>reloadList() );
	}
}