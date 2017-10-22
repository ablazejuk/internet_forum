$(document).ready(function() {
    if(!$('body').hasClass('home')) {
        return;
    }
    
    $('#threads-table').dataTable();
});