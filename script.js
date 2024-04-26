document.getElementById('loginBtn').addEventListener('click', function(){
    document.body.style.overflow = 'hidden';
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('loginContainer').style.display = 'block';
});

document.getElementById('overlay').addEventListener('click', function(){
    document.body.style.overflow = 'auto';
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('loginContainer').style.display = 'none';
});

document.getElementById('like').addEventListener('click', function(){
    document.getElementById('icone-like').classList.replace('fa-regular', 'fa-solid');
    document.getElementById('icone-like').style.color = '#2d44a0';
});