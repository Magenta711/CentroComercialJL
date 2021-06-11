var api_token = $('meta[name="api-token"]').attr('content');

$(window).on('load', function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	// Row Toggler
	// -----------------------------------------------------------------
	$('#demo-foo-row-toggler').footable();

	// Accordion
	// -----------------------------------------------------------------
	$('#demo-foo-accordion').footable().on('footable_row_expanded', function(e) {
		$('#demo-foo-accordion tbody tr.footable-detail-show').not(e.row).each(function() {
			$('#demo-foo-accordion').data('footable').toggleDetail(this);
		});
	});

	// Accordion
	// -----------------------------------------------------------------
	$('#demo-foo-accordion2').footable().on('footable_row_expanded', function(e) {
		$('#demo-foo-accordion2 tbody tr.footable-detail-show').not(e.row).each(function() {
			$('#demo-foo-accordion').data('footable').toggleDetail(this);
		});
	});

	// Pagination & Filtering
	// -----------------------------------------------------------------
	$('[data-page-size]').on('click', function(e){
		e.preventDefault();
		var newSize = $(this).data('pageSize');
		FooTable.get('#demo-foo-pagination').pageSize(newSize);
	});
	$('#demo-foo-pagination').footable();

	$('#demo-foo-addrow').footable();
	
    var addrow = $('#demo-foo-addrow2');
	addrow.footable().on('click', '.delete-row-btn', function() {

		//get the footable object
		var footable = addrow.data('footable');

		//get the row we are wanting to delete
		var row = $(this).parents('tr:first');

		//delete the row
		footable.removeRow(row);
	});


	// Add & Remove Row
	// -----------------------------------------------------------------
	var $modal = $('#editor-modal'),
		$editor = $('#editor'),
		$editorTitle = $('#editor-title'),
		ft = FooTable.init('#footable-addrow', {
			columns: $.get('http://ccjl.test/api/user_columns?api_token='.api_token),
			rows: $.get('http://ccjl.test/api/user?api_token='.api_token),
			editing: {
				addRow: function(){
					$modal.removeData('row');
					$editor[0].reset();
					$editorTitle.text('Crear');
					$modal.modal('show');
				},
				editRow: function(row){
					var values = row.val();
					$editor.find('#name').val(values.name);
					$editor.find('#email').val(values.email);
					$editor.find('#status').val(values.status);
					$modal.data('row', row);
					$editorTitle.text('Editar filas #' + values.id);
					$modal.modal('show');		
				},
				deleteRow: function(row){
					if (confirm('¿Está seguro de eliminar la fila?')){
						row.delete();
					}
				}
			}
		}),
		uid = 2;

	$editor.on('submit', function(e){
		if (this.checkValidity && !this.checkValidity()) return;
		e.preventDefault();
		date = new Date();
		addUser();
		var row = $modal.data('row'),
			values = {
				name: $editor.find('#name').val(),
				email: $editor.find('#email').val(),
				created_at: date.getFullYear() + '-' + ( ((parseInt(date.getMonth()) + 1) < 1  ? '0' : '') + parseInt(date.getMonth()) + 1 ) + '-' + ((date.getDate() + 1) < 1  ? '0' : '') + date.getDate(),
				status: 'Activo'
			};

		if (row instanceof FooTable.Row){
			row.val(values);
		} else {
			values.id = uid++;
			ft.rows.add(values);
		}
		$modal.modal('hide');
	});
});

function addUser() {
	let form = $("#editor")[0];
    data = new FormData(form);
	token = $('#token');
	$.ajax({
		type:"post",
		url : "api/user?api_token=".api_token,
		data : data,
		processData: false,
        contentType: false,
        cache: false,
        timeout: 1000000,
		success: function (response) {
            console.log('Data-->',response);
        },
		error: function (error) {
            console.log('Error-->',error);
        }
	});
}