let timeStop = false;

function sleep(ms) {
	return new Promise((resolve) => setTimeout(resolve, ms));
}

async function clock() {
	for (
		let i =
			localStorage.getItem('time') != null ? localStorage.getItem('time') : 1;
		i <= 300;
		i++
	) {
		document.getElementById('t-2').textContent = i;
		localStorage.setItem('time', i);
		await sleep(1000);

		if (timeStop == true) {
			break;
		}

		if (i == 300) {
			vis(localStorage.getItem('time'), document.getElementById('loss'));
		}

		document.cookie = 'time=' + i + '; SameSite=None; Secure';
	}
}

function vis(time, element) {
	if (time == 300) {
		element.style.display = 'block';
	} else {
		element.style.display = 'none';
	}
}

window.onload = function () {
	clock();
};
