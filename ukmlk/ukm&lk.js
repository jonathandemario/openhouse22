function closepopup(){
    document.getElementById("main").style.position = "absolute";
    document.getElementById("popup").style.display="none";

}

function bukapopup($ide){
    document.getElementById("main").style.position = "fixed";
    document.getElementById("popup").style.display="block";
    var lkid = $ide;
    $('#popup').load('popup.php?id='+lkid)


}
function bukapopupUKM($ide){
    document.getElementById("main").style.position = "fixed";
    document.getElementById("popup").style.display="block";
    var ukmid = $ide;
    $('#popup').load('popupukm.php?id='+ukmid)

}