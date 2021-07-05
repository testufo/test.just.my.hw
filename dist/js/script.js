console.log($("audio")[0]);

$("#audio-item").click(function(e){
    e.preventDefault(); 
    $("#audio-item").toggleClass("pause");
    if($("#audio-item").hasClass("pause")){
        $("audio")[0].play();
        console.log("play");
    } else{
        $("audio")[0].pause();
        console.log("pause");
    }
});

$("audio")[0].addEventListener("ended", function(){
    $("#audio-item").removeClass("pause");
});
