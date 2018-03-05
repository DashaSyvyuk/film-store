function showFilmForm(id)
{
    var display = $("#" + id + " form").css("display");
    if(display === "none")
    {
        $("#" + id + " form").slideDown("slow");
    }
    else
    {
        $("#" + id + " form").slideUp("slow");
    }
}
function validateForm()
{
    var date = new Date();
    var year = Number($("#Released_Year").val());
    var this_year = Number(date.getFullYear());
    if(1900 <= year && year <= this_year)
    {
        $("#sendForm").submit();
    }
    else
    {
        $("#error").slideDown("fast");
    }
}