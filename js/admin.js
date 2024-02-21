function prikaziLog(){

    let trazeniDatum = $("#datum").val();

    $.get("ajax/ajax_admin.php", {trazeniDatum: trazeniDatum}, function(response){
        $("#logDiv").html(response);
    });
}