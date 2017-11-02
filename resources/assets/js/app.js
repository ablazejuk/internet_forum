$(document).ready(function() {
    $(".textarea").wysihtml5({
        "font-styles": true, 
        "emphasis": true, 
        "lists": true,
        "html": false,
        "link": false, 
        "image": false
    });
    
    $('.table').dataTable();
});