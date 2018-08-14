(function (){
    
var $sidebarAndAllContent=$("#left-sidebar,#wrapper");


$("#buttonMenu").on("click", function(){

    $sidebarAndAllContent.toggleClass("hide_sidebar"); 

    if($sidebarAndAllContent.hasClass("hide_sidebar"))
    {
       $(this).text(">");
    }else
    {
       $(this).text("<");

    }
});






})();