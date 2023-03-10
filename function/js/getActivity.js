$(document).ready(function () {
    function getActivity() {
        var element = document.querySelector('select');
        var option = element.options[element.selectedIndex];
        var codice = option.value;

        return $.ajax({
            url: 'http://localhost/registro/function/api/getActivity.php',
            type: 'POST',
            dataType: 'json',
            data: {
                codice: codice
            }
        });
    }

    getActivity().done(function (data) {
        $("#InputNome").val(data[0]['nome']);
        $("#InputCFU").val(data[0]['cfu']);
    });

    $("select").change(function () {
        getActivity().done(function (data) {
            $("#InputNome").val(data[0]['nome']);
            $("#InputCFU").val(data[0]['cfu']);
        });
    });
});