window.onload = function() {



    var touchstartX = 0;
    var touchstartY = 0;
    var touchendX = 0;
    var touchendY = 0;
    
    var gesuredZone = document.getElementById('img-buttons-wrap');
    
    gesuredZone.addEventListener('touchstart', function(event) {
        touchstartX = event.screenX;
        touchstartY = event.screenY;
    }, false);
    
    gesuredZone.addEventListener('touchend', function(event) {
        touchendX = event.screenX;
        touchendY = event.screenY;
        handleGesure();
    }, false); 
    
    function handleGesure() {
        var swiped = 'swiped: ';
        if (touchendX < touchstartX) {
            alert(swiped + 'left!');
        }
        if (touchendX > touchstartX) {
            alert(swiped + 'right!');
        }
        if (touchendY < touchstartY) {
            alert(swiped + 'down!');
        }
        if (touchendY > touchstartY) {
            alert(swiped + 'left!');
        }
        if (touchendY == touchstartY) {
            alert('tap!');
        }
    }
}

var imageIndex = 1
changeImage(imageIndex)

function setImage(n, el) {
    let mainImage = document.getElementById('main-image')
    mainImage.setAttribute('src', el.getAttribute('src'))
}

function plusImage(n) {
    changeImage(imageIndex += n);
}

function currentSlide(n, el) {
    let img = document.getElementsByClassName('prop_img-select');
    let imgFor = true, i, len = img.length;
    for (i = 0; i < len; i++) {
        if (img[i] == el) {
            continue
        }
        img[i].classList.remove('active-img');
    }
    el.classList.add('active-img')
    changeImage(imageIndex = n+1)
}

function changeImage(n) {
    var i;
    var slides = document.getElementsByClassName('prop_img-select');
    let mainImage = document.getElementById('main-image');

    if (n > slides.length) {imageIndex = 1}
    if (n < 1) {imageIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        mainImage.setAttribute('src', slides[imageIndex-1].getAttribute('src'));
    }
    for (i = 0; i < slides.length; i++) {
        if (slides[i] == slides[imageIndex-1]) { continue }
        slides[i].classList.remove('active-img');
        
        if (screen.width > 1650) {
        slides[imageIndex-1].parentNode.scrollTop = slides[imageIndex-1].offsetTop-250;
        } else {
        slides[imageIndex-1].parentNode.scrollLeft = slides[imageIndex-1].offsetLeft-100;
        }
        slides[imageIndex-1].classList.add('active-img')
    }
}
