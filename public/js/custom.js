function showHideInfo(key)
{
    var display = $("#show-hide-" + key).css("display");
    var text = (display === "none") ? "Скрыть информацию" : "Показать информацию";
    $("#button-" + key).text(text);
    if(display === "none")
    {
        $("#show-hide-" + key).slideDown("slow");
    }
    else
    {
        $("#show-hide-" + key).slideUp("slow");
    }
}
function orderFilms(url,params)
{
    var sort = $("#sort select").val();
    document.location.href= url + sort + params;
}