$("#sendPalindrome").on("click", function () {
    let palindrome = $("#palindrome").val();
    $.ajax({
        method: "POST",
        url: "http://major.local/site/ajaxRequest/",
        cache: false,
        data: {'palindrome': palindrome},
        dataType: "html",
        beforeSend: function () {
            $("#sendPalindrome").prop("disabled", true);
        },
        success: function (answer) {
            $("#answer").html(answer);
        },
        complete: function () {
            $("#sendPalindrome").prop("disabled", false);
        }
    });
});

$('#palindrome').on('keypress', (function (event) {
    let keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode === 13) {
        event.preventDefault()
        $("#sendPalindrome").click();
    }
}));