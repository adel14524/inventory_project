$(document).ready(function (){
    $('#customerTable').DataTable( {
        processing: true,
        ajax: {
            url: '/customer/ajax',
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
                data: 'customer_image',
                name: 'customer_image',
                render: function ( data, type,row ) {
                    var html =
                    '<img src="'+ row.image_path +'" style="width:60px; height:50px">';
                    return html;
                },
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
                    '<a href="/customer/edit/'+ data +'" class="btn btn-info btn-sm" title="Edit Data"><i class="fas fa-edit"></i></a>' +
                    '&nbsp;&nbsp;' +
                    '<a href="/customer/delete/'+ data +'" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i> </a>';
                    return html;
                },
            },
        ],
    });
});
