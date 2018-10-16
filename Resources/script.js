(function (){
    
var $sidebarAndAllContent=$("#left-sidebar,#wrapper");


$("#buttonMenu").on("click", function(){

    $sidebarAndAllContent.toggleClass("hide_sidebar"); 

    if($sidebarAndAllContent.hasClass("hide_sidebar"))
    {
      $(this).css('background-image','url("/Resources/img/right_arrow.png")');
    }else
    {
      $(this).css('background-image','url("/Resources/img/left_arrow.png")');
    }
});

})();