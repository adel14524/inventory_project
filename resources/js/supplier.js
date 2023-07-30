$(document).ready(function (){
    $('#supplierTable').DataTable( {
        processing: true,
        ajax: {
            url: '/supplier/ajax',
        },
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'mobile_no',
                name: 'mobile_no'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'id',
                name: 'id',
                render: function ( data, type, row ) {
                    var html =
                    '<a href="/supplier/edit/'+ data +'" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>' +
                    '&nbsp;&nbsp;' +
                    '<a href="/supplier/delete/'+ data +'" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i> </a>';
                    return html;
                },
            },
        ],
    });
});
