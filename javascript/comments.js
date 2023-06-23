window.onload = function() {
    const div = document.getElementsByClassName("comments");
    div.onclick = function() {
        function recursiv(){
            var comment = prompt("Votre commentaire");
            if (comment === "") {
                return recursiv();
            }
            else if (comment == null) {
                alert ("Annulation..");
            }
    
            else{
                if (confirm ("Are u sure " + comment + " is your name ?")){
                    alert("Hello " + comment + " !");
                    div.innerHTML = "Hello " + comment + " !";
                }
            }
            }    
            recursiv();
    }
}