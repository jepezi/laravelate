$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
	// fileupload
    var $fileupload = $('#fileupload');
    var uploadUrl = $fileupload.data('url'),
        hiddenInput = $($fileupload.data('input'));
    // console.log(uploadUrl+' '+hiddenInput);
    $fileupload.fileupload({
        url: uploadUrl,
        dataType: 'json',
        type: 'POST',
        done: function (e, data) {
            // console.log(data.result.files);
            $.each(data.result, function (index, file) {
                if (file.error) {
                    $('#error-upload').html(file.error);
                    return false;
                }
                $('#imageUpload').attr('src', file.url);
                hiddenInput.val(file.url);
            });
        },
        fail: function(e, data) {
            console.log(data.errorThrown+', '+data.textStatus);
        },
        stop: function (e) {
            $('#fileuploadprogress').fadeOut("fast");
        },
        start: function (e) {
            $('#fileuploadprogress').show();
            $('#fileuploadprogress .progress-bar').css(
                'width','0%'
            );
            // reset error message
            $('#error-upload').html('');
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#fileuploadprogress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

});