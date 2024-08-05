async function awaitResponse() {
    var data = {};
    const reader = new FileReader();
    data['file'] = $('#form').find('input')[1].files[0];
    data['_token'] = $('#form').find('input')[0].value;
    reader.readAsDataURL(data['file']);
    reader.onloadend = function () {
        data['file'] = reader.result.split(',')[1];
        console.log(data['file']);
        $.ajax({
            url: window.location.href,
            method: "POST",
            contentType : 'application/json',
            data : JSON.stringify(data),
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', $('#form').find('input')[0].value);
            },
            success: function (d) {
                console.log(d);
            },
            
            timeout: 100000000
        })
    };
    
}


$(document).ready(function(){
    $('.input-file input[type=file]').on('change', function(){
        let file = this.files[0];
        $(this).next().html(file.name);
           
    });


    const button = document.querySelector('.button');
    const submit = document.querySelector('.submit');

    function toggleClass() {
        
      this.classList.toggle('active');
      console.log(awaitResponse()); 
    }

    function addClass() {
      this.classList.add('finished');
    }

    button.addEventListener('click', toggleClass);
    button.addEventListener('transitionend', toggleClass);
    button.addEventListener('transitionend', addClass);
})