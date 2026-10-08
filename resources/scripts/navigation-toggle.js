class NavigationToggle extends HTMLElement {
	constructor() {
		super();
		this.button = this.querySelector("#navigation-toggle");
		if (!this.button) return;
		this.button.addEventListener("click", this.toggleMenu.bind(this));
	}

	toggleMenu(event) {
		event.preventDefault();
		document.body.classList.toggle("menu-open");
	}
}

if (!customElements.get("navigation-toggle")) {
	customElements.define("navigation-toggle", NavigationToggle);
}
