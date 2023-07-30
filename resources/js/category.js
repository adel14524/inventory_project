$(document).ready(function (){
    $('#categoryTable').DataTable( {
        processing: true,
        ajax: {
            url: '/category/ajax',
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
                data: 'id',
                name: 'id',
                render: function ( data, type, row ) {
                    var html =
                    '<a href="/category/edit/'+ data +'" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>' +
                    '&nbsp;&nbsp;' +
                    '<a href="/category/delete/'+ data +'" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i> </a>';
                    return html;
                },
            },
        ],
    });
});
