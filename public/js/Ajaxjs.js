$(document).ready(function () {
    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "ajaxcall",
        "columns": [
            {"data": "Id"},
            {"data": "Name"},
            {"data": "Offset"},
            {
                "bSortable": false, "aTargets": [0],
                "targets": -1,
                "data": null,
                "render": function (data, type, full, meta) {
                    return "<a href='dataTimeZone/" + data.Id + "'><button class='one'><i class='glyphicon glyphicon-pencil'></i>EDIT</button></a>" + " <a href='dataTimeZoneDelete/" + data.Id + "'><button class='one'><i class='glyphicon glyphicon-trash'></i>DELETE</button></a>" + " <a href='ViewdataTimeZone/" + data.Id + "'><button class='view' value='" + JSON.stringify(data) + "'><i class='glyphicon glyphicon-eye-open'></i>VIEW</button></a>";

                }
            }
        ]


    });
});

