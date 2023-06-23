window.onload = function(){
    const textarea = document.getElementById('cuiitArea');
    const span = document.getElementById('count');
    let count = 140;
    span.innerHTML = count;
    let letter = [];
    textarea.addEventListener('keydown', function(event){
        if(event.key.length == 1){
            letter.push(event.key);
        }
        else if(event.key == "Backspace"){
            letter.shift();
        }
        else{

        }
        span.innerHTML = count - letter.length;
    })
}