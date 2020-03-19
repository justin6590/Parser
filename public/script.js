$(function() {
    $('#markdownform').submit(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: 'process',
            crossDomain: 'true',
            data: $('#markdownform').serialize(),
            success: function(d) {
                $("#markdownform-html").html(d).prepend('<h1>Parsed markdown</h1>');
                $("#markdownform-text").text(d).prepend('<h1>HTML source</h1>');
            }
        });
    });
});