$(document).ready(function() {
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        getData(url);
    });

    function getData(url) {
        $.ajax({
            url : url
        }).done(function (data) {
            $('.table').html(data);
        }).fail(function () {
            alert('Data could not be loaded.');
        });
    }
});