//Sua API
let postsApi = 'https://www.odonto.ufmg.br/cenex/wp-json/wp/v2/posts?per_page=3'



//Jovemnerd
//let postsApi = 'https://jovemnerd.com.br/wp-json/wp/v2/posts'

//B9
//let postsApi = 'https://www.b9.com.br/wp-json/wp/v2/posts/'

let posts = Http
posts.inicia(postsApi)