(function(window,$){


$.extend($.fn.dataTable.defaults, {
    //stateSave: true,
    //stateDuration: -1,
    autoWidth: false,
    //order: [],
    responsive: true,
    dom: '<"datatable-header"fBlr><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
        processing: "<div class='processing-container'>Подождите...</div>",
        search: "Поиск:",
        lengthMenu: "Показать _MENU_",
        info: "Записи с _START_ до _END_ из _TOTAL_ записей",
        infoEmpty: "Записи с 0 до 0 из 0 записей",
        infoFiltered: "(отфильтровано из _MAX_ записей)",
        infoPostFix: "",
        loadingRecords: "Загрузка записей...",
        zeroRecords: "Записи отсутствуют.",
        emptyTable: "В таблице отсутствуют данные",
        paginate: {
            first: "Первая",
            previous: "Предыдущая",
            next: "Следующая",
            last: "Последняя"
        },
        aria: {
            sortAscending: ": активировать для сортировки столбца по возрастанию",
            sortDescending: ": активировать для сортировки столбца по убыванию"
        }
    },
    initComplete: function(settings, json) {
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });
    }
});

window.LaravelDataTables=window.LaravelDataTables||{};window.LaravelDataTables["%1$s"]=$("#%1$s").DataTable(%2$s);

})(window,jQuery);

