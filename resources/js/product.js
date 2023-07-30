$(document).ready(function (){
    $('#productTable').DataTable( {
        processing: true,
        ajax: {
            url: '/product/ajax',
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
                data: 'supplier_name',
                name: 'supplier_name'
            },
            {
                data: 'unit_name',
                name: 'unit_name'
            },
            {
                data: 'category_name',
                name: 'category_name'
            },
            {
                data: 'id',
                name: 'id',
                render: function ( data, type, row ) {
                    var html =
                    '<a href="/product/edit/'+ data +'" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>' +
                    '&nbsp;&nbsp;' +
                    '<a href="/product/delete/'+ data +'" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i> </a>';
                    return html;
                },
            },
        ],
    });
});
