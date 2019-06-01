$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getData(page);
        }
    }
});

$(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        $('.page-item').removeClass('active');
        $(this).parent('li').addClass('active');
        //var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });
});

function getData(page) {
    $.ajax({
        url: '?page=' + page,
        type: 'get',
        datatype: 'html'
    }).done(function(data) {
        window.location.assign('?page=' + page);
        $('#paginate_post').empty().html(data);
    }).fail(function() {
        alert('No response from server');
    });
}
