
const Footer = () => {

  const [posts, setPosts] = useState([]);

  useEffect(async () => {
    const response = await fetch('https://www.odonto.ufmg.br/cenex/wp-json/wp/v2/posts?per_page=3')
    const data = await response.json()
    setPosts(data)
  }, [])

  console.log(posts)

  return (
    <footer className="footer">
      <div className="container-fluid">
        <h3 className="titulo-noticias">Últimas notícias do CENEX</h3>
        <div className="row footer-pad">

          { posts.map((post, index) => {
              return (
                <div className="col-md-4" key={index}>
                  <div className="noticias">
                    <a href={post.link} target='_blank' style={{color: "#000"}}>
                      <h4 dangerouslySetInnerHTML={{ __html: post.title.rendered }} />
                      </a>
                      <p dangerouslySetInnerHTML={{ __html: post.excerpt.rendered }} />
                    
                  </div>
                </div>
              )
            })}

        </div>
        <div className="row footer-direita footer-pad">
          <div className="col-md-6">
            <p className="copy">2024 © Copyright -
              <a href="https://www.odonto.ufmg.br/cenex/" target="blank"> CENEX Faculdade de Odontologia UFMG</a>
            </p>
          </div>
          <div className="col-md-6">
            <p className="copy justify-content-end">Desenvolvido por:
              <a href="https://www.natiwo.com.br/" target="blank"> NATIWO Agência Digital</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
};
