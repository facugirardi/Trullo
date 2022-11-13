let log2 = false;

function log(){

    log2 = true;
    if(log2){
        document.getElementById('buttons2').style.display = 'none';
        document.getElementById('buttons1').style.display = 'block';
    } else{
        document.getElementById('buttons1').style.display = 'none';
        document.getElementById('buttons2').style.display = 'block';
    }

}



if(log2){
    document.getElementById('buttons2').style.display = 'none';
    document.getElementById('buttons1').style.display = 'block';
} else{
    document.getElementById('buttons1').style.display = 'none';
    document.getElementById('buttons2').style.display = 'block';
}
