// document ready
$(function () {
    // initiating data table
    var DataTableInstance = new DataTableFactory();
    DataTableInstance.init({
        dt_id : '_datatable',
        columns: [
            { data: 'selectRow', name: 'selectRow' },
            { data: 'id', name: 'id' },
            { data: 'photo', name: 'photo' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at', 
                render: function(data, type, row){
                    return new Date(row.created_at).toLocaleDateString();
                } 
            },
            { data: 'action', name: 'action' },
        ],
    });
    // initiating modal form management
    var ManageModalFormInstance = new ManageModalForm();
    ManageModalFormInstance.init(DataTableInstance,{
       /* 'name': {
            validators: {
                notEmpty: {
                    message: 'Title name is required'
                }
            }
        },

        'description': {
            validators: {
                notEmpty: {
                    message: 'description is required'
                }
            }
        },

        
        'photo': {
            validators: {
                notEmpty: {
                    message: 'photo is required'
                }
            }
        },
        */
     
    });
});