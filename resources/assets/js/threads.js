$(document).ready(function() {
    if(!$('body').hasClass('threads')) {
        return;
    }
    
    $(".textarea").wysihtml5();
});