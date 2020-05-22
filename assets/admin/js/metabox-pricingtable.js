jQuery(document).ready(function($)
	{


		$('.pricingtable-color').wpColorPicker();

		$(document).on('click', '#pricingtable_admin .toggle', function(){



			if($(this).parent().hasClass('active')){
                $(this).parent().removeClass('active')
			}
			else{
                $(this).parent().addClass('active');
			}




		})





				

	});	







