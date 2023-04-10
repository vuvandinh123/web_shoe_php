class ToastManager {

	constructor(){
		this.id = 0;
		this.toasts = [];	
		this.icons = {
			'SUCCESS': 'fa-check',
			'ERROR': 'fa-exclamation-circle',
			'INFO': 'fa-info-circle',
			'WARNING': 'fa-exclamation-triangle',
		};
		
		var body = document.querySelector('body');
		
		this.toastsContainer = document.createElement('div');
		this.toastsContainer.classList.add('toasts');
		
		body.appendChild(this.toastsContainer);	
	}	
	
	showSuccess(message) {
		return this._showToast(message, 'SUCCESS');
	}
	
	showError(message) {
		return this._showToast(message, 'ERROR');
	}
	
	showInfo(message) {
		return this._showToast(message, 'INFO');
	}
	
	showWarning(message) {
		return this._showToast(message, 'WARNING');
	}
	
	_showToast(message, toastType) {
		var newId = this.id + 1;
		
		var newToast = document.createElement('div');
		newToast.style.display = 'inline-block';
		newToast.classList.add(toastType.toLowerCase());
		newToast.classList.add('toast');
		newToast.innerHTML = `
			<progress max="100" value="0"></progress>
			<h3> <span> <i class="fas ${this.icons[toastType]}"></i> </span> ${message} </h3> 
		`;
		
		
		var newToastObject = {
			id: newId,	
			message,
			type: toastType,
			timeout: 4000,
			progressElement: newToast.querySelector('progress'),
			counter: 0,
			timer: setInterval(() => {
				newToastObject.counter += 1000 / newToastObject.timeout;	
				newToastObject.progressElement.value = newToastObject.counter.toString();
				if(newToastObject.counter >= 100) {
					newToast.style.display = 'none';	
					clearInterval(newToastObject.timer);
					this.toasts = this.toasts.filter((toast) => {
						return toast.id === newToastObject.id;	
					});
				}
			}, 10)
		}
		
		newToast.addEventListener('click', () => {
			newToast.style.display = 'none';	
			clearInterval(newToastObject.timer);
			this.toasts = this.toasts.filter((toast) => {
				return toast.id === newToastObject.id;	
			});
		});
		
		this.toasts.push(newToastObject);
		
		this.toastsContainer.appendChild(newToast);
		
		return this.id++;
	}
	
}
var toasts = new ToastManager();

var successBtn = document.querySelector('#success-btn');
var errorBtn = document.querySelector('#error-btn');
var infoBtn = document.querySelector('#info-btn');
var warningBtn = document.querySelector('#warning-btn');

function showSuccess1(){
	toasts.showSuccess('This is an error message!');
}


errorBtn.addEventListener('click', () => {
	toasts.showError('This is an error message!');
});

infoBtn.addEventListener('click', () => {
	toasts.showInfo('This is an info message!');
});

warningBtn.addEventListener('click', () => {
	toasts.showWarning('This is a warning message!');
});
