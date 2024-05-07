
    $(document).ready(function() {
        $("#form_id").closest('form').on('submit', function(event) {
            event.preventDefault();
            callReplaceArray();
        });
    });

    function callReplaceArray() {
        var arrayInput = $("#array_input_id").val();
        var valueNeedReplace = $("#value_need_replace_id").val();
        var valueReplace = $("#value_replace_id").val();

        $.ajax({
            type: "POST",
            url: "fetch.php",
            data: {
                array_input: arrayInput,
                value_need_replace: valueNeedReplace,
                value_replace: valueReplace
            },
            dataType: "json",
            success: function(response) {
                if (response.error) {
                    // Display error message in the result_error div
                    $("#result_error").text(response.message);
                }
                if(response.before_value !== undefined && response.after_value !== undefined) {
                    $("#before_value_id").val(response.before_value);
                    $("#after_value_id").val(response.after_value);

                    // Clear any previous error messages
                    $("#result_error").text('');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

                $("#result_error").text('An error occurred while processing your request.');
            }
        });
    }