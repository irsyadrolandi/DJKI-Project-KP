// File: script.js
$(document).on('click', '#editmodal', function() {
    var id = $(this).data('id');
    
    $.ajax({
        url: "{{ url('editmodal') }}" + "/" + id,
        type: "get",
        dataType: 'json',
        success: function(response) {
            var fotoUrl = response.fotoUrl;
            $('#imagePreview').attr('src', fotoUrl);
            $('#exampleModal').modal('show');
        },
        error: function(xhr, textStatus, error) {
            console.log(xhr.responseText);
        }
    });
});
