$(function() {

    $.ajax({
        type: "GET",
        url: "Restaurants/index.php"
    }).done(function(food) {

        $("#jsGrid").jsGrid({
            height: "70%",
            width: "100%",
            filtering: true,
            inserting: true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete client?",
            controller: {
                loadData: function(filter) {
                 return $.ajax({
                        type: "GET",
                        url: "Restaurants/index.php",
                        dataType: 'json',
                        success: function (result) {
                            return result;
                        },
                    });
                },
                insertItem: function(item) {
                    return $.ajax({
                        type: "POST",
                        url: "Restaurants/index.php",
                        data: item
                    });
                },
                updateItem: function(item) {
                    return $.ajax({
                        type: "PUT",
                        url: "Restaurants/index.php",
                        data: item
                    });
                },
                deleteItem: function(item) {
                    return $.ajax({
                        type: "DELETE",
                        url: "Restaurants/index.php",
                        data: item
                    });
                }
            },

            fields: [
                { name: "name", title: "Name", type: "text", width: 150 },
                { name: "street", title: "Street", type: "text", width: 200 },
                { name: "secondary_street", title: "Secondary Street", type: "text", width: 200 },
                { name: "city", title: "City", type: "text", width: 200 },
                { name: "zip", title: "Zip", type: "text", width: 200 },
                { type: "control" }
            ]
        });

    });


});