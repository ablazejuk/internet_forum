$(document).ready(function() {
    if(!$('body').hasClass('threads')) {
        return;
    }
    
    $('#threads-table').dataTable();
});