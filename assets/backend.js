import './backend.css';

import { shouldPerformTransition, performTransition } from "turbo-view-transitions";

document.addEventListener("turbo:before-render", (event) => {
	if (shouldPerformTransition()) {
		event.preventDefault();

		performTransition(document.body, event.detail.newBody, async () => {
			await event.detail.resume();
		});
	}
});