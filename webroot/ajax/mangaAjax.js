
function reloadListAdmin(page){
	var url='/forum/indexAjax.php?controller=Manga&action=admin_indexAjax&page=';
	if(page == null)
		url +='1';
	else
		url +=page;
	if(document.getElementById('myInput').value !=''){
		url+='&search='+document.getElementById('myInput').value;
	}

	fetch(url)
	.then(r => r.json())
	.then(r => {
		document.getElementById('total').innerText=r.total + ' Mangas';
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
			if(r.page >1){
				var ul = document.createElement('ul');
				ul.className+="pagination";
				document.getElementById('pagination').innerText='';
				document.getElementById('pagination').appendChild(ul);
				for(let i = 0; i < r.page; i++){
					var li = document.createElement('li');
					ul.appendChild(li);
					li.innerHTML += `<a href="#" onclick="reloadList(${i+1})" class="page-link">${i+1}</a>`;
					if(i+1 == r.activePage){
						li.className +="page-item active";
					}
					else{
						li.className +="page-item";
					}
				}
			}

		}
		else{
			pagination.innerText='';
			liste.innerText='';
		}

	})
	.catch(e => {});
}
function reloadList(page){
	
	var url='/forum/indexAjax.php?controller=Manga&action=indexAjax&page=';
	if(page == null)
		url +='1';
	else
		url +=page;
	if(document.getElementById('myInput').value !=''){
		url+='&search='+document.getElementById('myInput').value;
	}
	fetch(url)
	.then(r => r.json())
	.then(r => {
		if (r.mangas.length > 0) {
			
			content.innerText='';
			pagination.innerText='';
			for(let data of r.mangas){
				var div = document.createElement('div');
				div.className +='row row-hover';
				div.innerHTML=`
					<div class="col col-sm-2">
						<img src="https://dummyimage.com/60x60/fff/000000" class="img-thumbnail rounded float-right">
					</div>
					<div class="col col-sm-10">
						<h5 class="header"><a class="manga-link" href="view/${data.id}-${data.slug}">${data.name}</a></h5>
						<p>${data.sumary}</p>
					</div>

				`;
				document.getElementById('content').appendChild(div);

			}
			if(r.page > 1){
				var ul = document.createElement('ul');
				ul.className+="pagination";
				document.getElementById('pagination').innerText='';
				document.getElementById('pagination').appendChild(ul);
				for(let i = 0; i < r.page; i++){
					var li = document.createElement('li');
					ul.appendChild(li);
					li.innerHTML += `<a href="#" onclick="reloadList(${i+1})" class="page-link">${i+1}</a>`;
					if(i+1 == r.activePage){
						li.className +="page-item active";
					}
					else{
						li.className +="page-item";
					}
				}
			}
			

		}
		else{
			pagination.innerText='';
			content.innerText='';
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
		}).then(() =>reloadListAdmin() );
	}
}