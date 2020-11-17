window.onload = function(){
    var lookup = document.querySelector("button");
    console.log(lookup);
    var resultArea = document.getElementById("result");
    console.log(resultArea);
    var country = document.querySelector("input");
    console.log(country);
    lookup.addEventListener('click', handleClick);
    var httpRequest = new XMLHttpRequest();

    function handleClick(clickEvent){
        clickEvent.preventDefault();
        console.log("I GOT CLICKED")
        var url = "world.php?query=" + country.value;
        console.log(country.value);
        console.log(url);
        httpRequest.onreadystatechange = fetchingdata;
        httpRequest.open('GET', url, true);
        httpRequest.send();
    }
    
    function fetchingdata(){
        if (httpRequest.readyState === XMLHttpRequest.DONE){
            if (httpRequest.status === 200){
                var response = httpRequest.responseText;
                resultArea.innerHTML = response;
            }
            else{
                resultArea.innerHTML = "Error: This resquest can not be deliver. Please try again.";
            }
        }
    }
}