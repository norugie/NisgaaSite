// Custom JS DataTable
$('.js-basic-example').DataTable({
    "bSort": false,
    "lengthChange": false,
    "iDisplayLength": 5
});

// Custom JS Bootstrap DatePicker
$('#bs_datepicker_range_container_new').datepicker({
	autoclose: true,
	container: '#bs_datepicker_range_container_new',
	todayHighlight: true,
	startDate: '0d',
	format: 'dd M yyyy'
});

$('#bs_datepicker_range_container_edit').datepicker({
	autoclose: true,
	container: '#bs_datepicker_range_container_edit',
	todayHighlight: true,
	startDate: '0d',
	format: 'dd M yyyy'
});

$('#bs_datepicker_range_container_event').datepicker({
	autoclose: true,
	container: '#bs_datepicker_range_container_event',
	todayHighlight: true,
	startDate: '0d',
	format: 'dd M yyyy'
});

// Custom JQuery Validator
$('.edit_form_validate').validate({
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});

$('.new_form_validate').validate({
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});

$('.new_user_validate').validate({
    rules: {
        'username': {
            required: true,
            alreadyExists: true
        }
    },
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});

$('.profile_name').validate({
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});

$('.profile_password').validate({
    rules: {
        'r_password': {
            required: true,
            equalTo: '#new_password'
        }
    },
    unhighlight: function (input) {
        $(input).parents('.form-line').removeClass('error');
    },
    errorPlacement: function (error, element) {
        $(element).parents('.form-group').append(error);
    }
});
