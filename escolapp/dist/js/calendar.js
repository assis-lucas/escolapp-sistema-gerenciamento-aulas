 var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("#data-input")[0].setAttribute('min:', today);