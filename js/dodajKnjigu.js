$(function(){
    $("#poruka").hide();

    prikaziSveKnjige()
})

function snimiKnjigu(){
    let naslov = $("#naslov").val().trim();
    let autor = $("#autor").val().trim();
    let brStrana = $("#brStrana").val().trim();

    $("#poruka").hide();

    if(naslov == "" || autor == "" || brStrana == ""){
        $("#poruka").show();
        $("#poruka").html("Sva polja knjige su obavezna!!!!");
        return;
    }

    brStrana = parseInt(brStrana);
    if(isNaN(brStrana)){
        $("#poruka").show();
        $("#poruka").html("Broj strana treba da bude ceo broj!!!!");
        return;
    }

    $.post("ajax/ajax_dodajKnjigu.php", {naslov: naslov, autor: autor, brStrana: brStrana}, function(response){
        prikaziSveKnjige();
    });
}

function prikaziSveKnjige(){
    $.get("ajax/ajax_dodajKnjiguGet.php", function(response){
        $("#knjige").html(response);
    });
}

function obrisiKnjigu(idKnjige){
    $.get("ajax/ajax_dodajKnjiguBrisanje.php", {idKnjige: idKnjige}, function(response){
        prikaziSveKnjige();
    });
}