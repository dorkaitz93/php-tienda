function mezuaBidali() {
    let izena = document.getElementById('izena').value;
    let email = document.getElementById('email').value;
    let mezua = document.getElementById('mezua').value;

    if (izena.trim() == "" || email.trim() == "" || mezua.trim() == "") {
        alert("Eremu guztiak bete behar dira");
    } else {
        let httpRequest = new XMLHttpRequest();
        
        httpRequest.open("POST", "index.php", true);
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        httpRequest.onreadystatechange = function() {
            if (httpRequest.readyState == 4) {
                if (httpRequest.status == 200) {
                    document.getElementById('komentarioa').innerHTML = this.responseText;
                } else {
                    alert("Falloa komunikazioan: " + this.statusText);
                }
            }
        }

        // encodeURIComponent erabiltzen dugu karaktere bereziekin arazorik ez izateko
        let params = "izena=" + encodeURIComponent(izena) +
                    "&email=" + encodeURIComponent(email) + 
                    "&mezua=" + encodeURIComponent(mezua);
        
        httpRequest.send(params);
    }
}