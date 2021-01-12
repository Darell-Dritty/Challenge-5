function plus(){
    var aantal = parseInt (document.getElementById('number').aantal, 10);
    aantal = isNaN(aantal) ? 0 : aantal;
    aantal++;
    document.getElementById('number').value = aantal;
}

function min(){
    var aantal = parseInt (document.getElementById('number').aantal, 10);
    aantal = isNaN(aantal) ? 0 : aantal;
    aantal < 1 ? aantal = 1 : '';
    aantal--;
    document.getElementById('number').value = aantal;
}