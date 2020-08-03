$(document).ready(function(){
	let list = {};
	list.fac = null;
	list.cities = null;
	const token = $('meta[name=csrf-token]').attr("content");;
	
	$('.facilities_checkbox').click(function(){
		list.fac = [];
		$('.facilities_checkbox').each(function(){
			if($(this).is(':checked'))
			{
				list.fac.push('f.'+$(this).attr('id'));
			}
		});
		ajaxCall();
	});

	$('.cities_checkbox').click(function(){
		list.cities = [];
		$('.cities_checkbox').each(function(){
			if($(this).is(':checked'))
			{
				list.cities.push($(this).attr('id'));
			}
		});
		ajaxCall();
	});
;
	function ajaxCall()
	{
		$.ajax({
			url: 'ajaxCall',
			method: 'POST',
			data: {'_token': token, 'list': list},
			success: function(response)
			{
				console.log(response.length);
				let hotels_div = $('#hotels_div');
				hotels_div.html('');
				if(response.length != undefined)
				{
					$(response).each(function(){
						const hotel = $(this)[0];

						const output = `
						<div class="col-lg-4 col-md-6">
	                    <div class="room-item">
	                        <img height="450px" src="{{ asset('../storage/app/'${hotel['path']}${hotel['unique_identifier']}" alt="">
	                        <div class="ri-text">
	                            <h4> ${hotel['name']} </h4>
	                            <h3> Rs.  ${hotel['rate_per_person']}<span>/Perperson</span></h3>
	                            <table>
	                                <tbody>
	                                    <tr>
	                                        <td class="r-o">City:</td>
	                                        <td> ${hotel['city']} </td>
	                                    </tr>

	                                    <tr>
	                                        <td class="r-o">Capacity:</td>
	                                        <td> ${hotel['capacity']} </td>
	                                    </tr>

	                                    <tr>
	                                        <td class="r-o">Rate per Person:</td>
	                                        <td> ${hotel['rate_per_person']} </td>
	                                    </tr>

	                                    <tr>
	                                        <td class="r-o">Services:</td>
	                                        <td>
	                                            ${hotel['wifi'] ? 'Wifi, ' : '' }
	                                            ${hotel['parking'] ? 'Parking, ' : '' }
	                                            ${hotel['spa'] ? 'Spa, ' : '' }
	                                            ${hotel['AC'] ? 'AC' : '' }
	                                           
	                                        </td>
	                                    </tr>
	                                </tbody>
	                            </table>
	                            <a href="hotels/${hotel['id']}" class="primary-btn">More Details</a>
	                        </div>
	                    </div>
	                </div>
						`;
					hotels_div.append(output);

					});
				}
				else
				{
					hotels_div.append(`<h3 class="text-center mt-5"> NO DATA FOUND. </h3>`);
				}
			},
			error: function(err)
			{
				console.log(err);
			}
		});
	}


});