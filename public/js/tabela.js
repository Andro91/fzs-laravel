$(document).ready(function () {
    $('#tabela').dataTable({
        "aaSorting": [],
        "oLanguage": {
            "sProcessing": "Процесирање у току...",
            "sLengthMenu": "Прикажи _MENU_ елемената",
            "sZeroRecords": "Није пронађен ниједан резултат",
            "sInfo": "Приказ _START_ до _END_ од укупно _TOTAL_ елемената",
            "sInfoEmpty": "Приказ 0 до 0 од укупно 0 елемената",
            "sInfoFiltered": "(филтрирано од укупно _MAX_ елемената)",
            "sInfoPostFix": "",
            "sSearch": "Претрага:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Почетна",
                "sPrevious": "Претходна",
                "sNext": "Следећа",
                "sLast": "Последња"
            }
        }
    });
});