(function(){
  let preco = document.querySelectorAll('.preco_cart');
  let total = 0;

  preco.forEach(function(element) {
    total += parseInt(element.textContent);
  });

  let preco_total = document.querySelectorAll('.total_carrinho');

  preco_total.forEach(function(element) {    
    element.textContent = total;
  });
  
  
})();