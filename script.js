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