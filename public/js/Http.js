const Http = {
	inicia: (postsAPI) => Http._pega(postsAPI),
	_pega: (postsAPI) => {
		fetch(postsAPI,{method:'get'})
			.then(res => res.json())
			.then(posts => Http._monta(posts), err => {
				let template = `
				<span style="color:red">
					Esse servidor não fornece permissão para consumo de sua API
				</span>
				`
				document.querySelector('.posts').innerHTML = template
			})
	},
	_monta: (posts) => {
		posts.map(post => {
			let template = `
				<div class="col-md-4 noticias">
					<a href=${post.link} target='_blank' style={{color: "#000"}>
						<h4>${post.title.rendered}</h4>
					</a>					
					<p>${post.content.rendered}</p>
				</div>
			`
			document.querySelector('.posts').innerHTML += template
		})
	}
}