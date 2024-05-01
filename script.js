document.getElementById('login-btn').addEventListener('click', function(){
    document.body.style.overflow = 'hidden';
    document.getElementById('fundo-sobreposicao').style.display = 'block';
    document.getElementById('loginContainer').style.display = 'block';
});

document.getElementById('fundo-sobreposicao').addEventListener('click', function(){
    document.body.style.overflow = 'auto';
    document.getElementById('fundo-sobreposicao').style.display = 'none';
    document.getElementById('loginContainer').style.display = 'none';
});

document.getElementById('like').addEventListener('click', function(){
    document.getElementById('icone-like').classList.replace('fa-regular', 'fa-solid');
    document.getElementById('icone-like').style.color = '#2d44a0';
});