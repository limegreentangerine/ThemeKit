class NavigationToggle extends HTMLElement {
	button: HTMLButtonElement | null;

	constructor() {
		super();
		this.button = this.querySelector<HTMLButtonElement>("#navigation-toggle");
		if (!this.button) return;

		this.button.addEventListener("click", this.toggleMenu.bind(this));
	}

	toggleMenu(event: MouseEvent) {
		event.preventDefault();
		document.body.classList.toggle("menu-open");
	}
}

if (!customElements.get("navigation-toggle")) {
	customElements.define("navigation-toggle", NavigationToggle);
}
