new Vue({
	el: '#page',
	data: {
		data: {}
	},
	methods: {
		fetchCvData() {
			fetch("data.json")
				.then(res => res.json())
				.then(data => (this.data = data));
		},
		printPhone(phone) {
			if (!phone) return false;
			return phone.replace(/(\d{2})(\d{4})(\d{4})/, '$1 $2 $3');
		},
		printDuration(start, end = null, format = 'MMM YYYY', humanReadable = true) {

			let startDate = moment(start).format(format);
			let endDate = end ? moment(end).format(format) : 'Presente';

			let months = end ? moment(end).diff(moment(start), 'months') : moment().diff(moment(start), 'months');
			let years = 0;

			if (months > 12) {
				years = months >= 12 ? Math.floor(months / 12) : 0;
				months = months - (Math.floor(months / 12) * 12) + 1
			}

			let time = `${months} Meses`;
			if (years > 0) {
				time = `${years} Años`;
				if (months == 1) {
					time += ` y ${months} Mes`;
				} else if (months > 0) {
					time += ` y ${months} Meses`;
				}
			}

			let duration = humanReadable ? ` (${time})` : '';

			return `${startDate} - ${endDate}` + duration;

		}
	},
	created() {
		this.fetchCvData()
	}
});


