if(!navigator.geolocation){
    throw new Error("No geolocation available");
}

function success(pos){
    console.log(pos);
    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    document.getElementById('yourlocation').innerHTML = "<p>Szélesség: " + lat+"</p>" +" <p>Hosszúság: " + lng + "</p>";
}

function error(err){
    if (err.code === 1){
        alert("Allow access to geolocation");
    }
    else{
        alert("Position unavailable");
    }
    
}

const options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0,
};

window.navigator.geolocation.watchPosition(success, error, options);



                                