$(function(){
    $("#poruka").hide();
})

function prijava(){
    let email = $("#email").val().trim();
    let lozinka = $("#lozinka").val().trim();

    $("#poruka").hide();

    if(email == "" || lozinka == ""){
        $("#poruka").show();
        $("#poruka").html("Svi podaci su obavezni!!!");
        return false;
    }

    $.post("ajax/ajax_index.php", {email: email, lozinka: lozinka}, function(response){


        if(response == 1){
            window.location.href = "dodajKnjigu.php";
        } else {
            $("#poruka").show();
            $("#poruka").html(response);
        }
    });
}