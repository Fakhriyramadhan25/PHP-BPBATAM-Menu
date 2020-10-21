function initialize(point = {lat: 1.130432 ,  lng: 104.053252 }) {
  const berdiri = point;
  const map = new google.maps.Map(document.getElementById("map"), {
    center: berdiri,
    zoom: 14
  });
  const panorama = new google.maps.StreetViewPanorama(
    document.getElementById("pano"),
    {
      position: berdiri,
      pov: {
        heading: 0,
        pitch: 10
      }
    }
  );
  map.setStreetView(panorama);

}

function ubahStreetView(point){
  initialize(point)
}
