$(function(){
	/*
	* 根据选择的学校从后端获得该学校的所有
	* 学院名称和ID作为学院的选项
	*/
	$('#school').change(function() {
		var id = $('#school').val();
		$.ajax({
  			url: 'addTeacher',
  			dataType: 'json',
  			data: {school_id: id.toString()}
		}).done(function(data) {
			var colleges = $.parseJSON(data);
			for (var i = 0; i < colleges.length; ++i) {
				var opt = $('<option/>').attr({"value" : colleges[i].id}).text(colleges[i].college_name);
				$('#college').append(opt);
			}
		});
	});

	$('#addbtn').click(function() {
		alert('click');
		if ($('#school').val() != "0" && $('#college').val() != "0" && $('#name').val() != '') {
			$.post( "addTeacher", { name: "John", time: "2pm" })
  				.done(function( data ) {
    				alert( "Data Loaded: " + data );
  			});	
		}
	});
});