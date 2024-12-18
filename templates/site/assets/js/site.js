$(document).ready(function () {
    $('#searchResult').hide();
    $('#search').keyup(function () {
        var search = $(this).val();
        if (search.length > 0) {
            $.ajax({
                url: $('form').attr('data-url-search'),
                method: 'POST',
                data: {
                    search: search
                },
                success: function (data) {
                    $('#searchResult').show();

                    if (data) {
                        $('#searchResult').html("<div class='card text-dark'>\n\
<div class='card-body'><ul class='list-group list-group-flush'>" + data + "</ul></div></div>");
                    } else {
                        $('#searchResult').html("<div class='alert alert-warning'>Nenhum resultado encontrado</div>");
                    }
                }
            });
        } else {
            $('#searchResult').hide();
        }
    });
});