function addOffLineOrder() {
    var product_id = document.getElementById('product_id').value;
    var product = document.getElementById('product_name').value;
    var value = document.getElementById('value').value;
    var cell = document.getElementById('cell').value;
    var fname = document.getElementById('fname').value;
    var btnOrderOffline = document.getElementById('btnOrderOffline');
    var url = window.origin+'/offlineOrder/save?product_id='+product_id+'&&product='+product+'&&value='+value+'&&cell='+cell+'&&fname='+fname ;
    console.log(fname);
    if ((fname === '') || (cell === '')){
        alert(url);
    }else {
        var request = new XMLHttpRequest();
        request.open('get', url);
        request.onreadystatechange = function (){
            if ((request.readyState === 4) && (request.status === 200)) {
                console.log(request);
                btnOrderOffline.innerHTML = 'Registered !';
            }else {
                btnOrderOffline.innerHTML = 'Loading';
            }
        };
        request.send();
    }

}