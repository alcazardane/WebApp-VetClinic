$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebarMenu').toggleClass('active');
        $(this).toggleClass('active');
    });
});