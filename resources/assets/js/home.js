$(document).ready(function() {
    if(!$('body').hasClass('home')) {
        return;
    }
    
    $('#example1').dataTable();
});