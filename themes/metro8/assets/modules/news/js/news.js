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
            { data: 'title', name: 'title' },
            { data: 'content', name: 'content' },
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
        'title_en': {
            validators: {
                notEmpty: {
                    message: 'faild required'
                }
            }
        },

        'title_ar': {
            validators: {
                notEmpty: {
                    message: 'faild required'
                }
            }
        },


        'title_fr': {
            validators: {
                notEmpty: {
                    message: 'faild required'
                }
            }
        },


        'title_ja': {
            validators: {
                notEmpty: {
                    message: 'faild required'
                }
            }
        },



        'content_en': {
            validators: {
                notEmpty: {
                    message: 'faild required'
                }
            }
        },

        'content_ar': {
            validators: {
                notEmpty: {
                    message: 'faild required'
                }
            }
        },


        'content_fr': {
            validators: {
                notEmpty: {
                    message: 'faild required'
                }
            }
        },


        'content_ja': {
            validators: {
                notEmpty: {
                    message: 'faild required'
                }
            }
        },

 
 
     
    });
});