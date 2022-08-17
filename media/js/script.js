"use strict";

document.addEventListener
(
	'DOMContentLoaded',
	function()
	{
		// 
		// 
		document.querySelector('input.product_image').parentNode.parentNode.parentNode.insertAdjacentHTML('beforeend', '<input class=\"btn btn-mini btn-primary\" type=\"file\" id=\"wishbox_product_images\" multiple=\"multiple\" name=\"wishbox_product_images[]\" />');
		// 
		// 
		document.querySelectorAll('input.product_image');
		// 
		// 
		let divs = document.querySelectorAll('input.product_image');
		// 
		// 
		[].forEach.call
		(
			divs,
			function(div)
			{
				// 
				// 
				div.parentNode.parentNode.style.display = 'none';
			}
		);
		// 
		// 
		document.querySelector('input#wishbox_product_images').addEventListener
		(
			'change',
			function(event)
			{
				// 
				// 
				if (parseInt(event.target.files.length) > wishboxadminmuimages_product_image_upload_count)
				{
					// 
					// 
					alert('You can only upload a maximum of ' + wishboxadminmuimages_product_image_upload_count + ' files');
				}
			}
		);
	},
	false
);