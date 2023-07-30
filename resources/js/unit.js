$(document).ready(function (){
    $('#unitTable').DataTable( {
        processing: true,
        ajax: {
            url: '/unit/ajax',
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
                    '<a href="/unit/edit/'+ data +'" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>' +
                    '&nbsp;&nbsp;' +
                    '<a href="/unit/delete/'+ data +'" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i> </a>';
                    return html;
                },
            },
        ],
    });
});
