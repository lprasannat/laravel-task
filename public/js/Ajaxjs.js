$(document).ready(function () {
    $('#timeZone').DataTable({      
        "processing": true,
        "serverSide": true,
        "ajax": "ajaxcall",
        
        "columns": [
            {"data": "Id"},
            {"data": "name"},
            {"data": "offset"},
            {
                "bSortable": false, "aTargets": [0],
                "targets": -1,
                "data": null,
                "render": function (data, type, full, meta) {
                    return "<a href='dataTimeZone/" + data.Id + "'><button class='one'>EDIT</button></a>" + " " + "<button class='del' value='" + data.Id + "'>DELETE</button>" + " " + "<button class='view' value='" + JSON.stringify(data) + "'>VIEW</button>";

                }
            }
        ]


    });
});

