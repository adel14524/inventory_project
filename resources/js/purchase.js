$(document).ready(function (){
    $('#purchaseTable').DataTable( {
        processing: true,
        ajax: {
            url: '/purchase/ajax',
        },
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'purchase_no',
                name: 'purchase_no'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'supplier_name',
                name: 'supplier_name'
            },
            {
                data: 'category_name',
                name: 'category_name'
            },
            {
                data: 'buying_qty',
                name: 'buying_qty'
            },
            {
                data: 'product_name',
                name: 'product_name'
            },
            {
                render: function ( data, type, row ) {
                    return '<span class="btn btn-warning">Pending</span>';
                },
            },
            {
                data: 'id',
                name: 'id',
                render: function ( data, type, row ) {
                    var html = '<a href="/product/delete/'+ data +'" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i> </a>';
                    return html;
                },
            },
        ],
    });
});
