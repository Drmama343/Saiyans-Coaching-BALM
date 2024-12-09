document.addEventListener('DOMContentLoaded', function() {

	console.log(document.querySelectorAll('celluleImage'));


	document.querySelectorAll('celluleImage').addEventListener('click', function() {
		const lien = this.getAttribute('class');

		console.log(lien);

	});

});