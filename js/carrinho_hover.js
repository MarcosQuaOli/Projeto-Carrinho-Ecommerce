(function() {
  let btn_carrinho = document.querySelector('.btn_carrinho');

  btn_carrinho.addEventListener('mouseenter', (e) => {
    let carrinho = e.target.querySelector('.carrinho');
    
    carrinho.classList.add('active');
  })

  btn_carrinho.addEventListener('mouseleave', (e) => {
    let carrinho = e.target.querySelector('.carrinho');

    carrinho.classList.remove('active');
  })

})();
    