const tabsBlock = document.querySelector(".service-tabs");

if (tabsBlock) {
	const tabs = tabsBlock.querySelectorAll(".tab-title");
	const tabContent = tabsBlock.querySelectorAll(".tab-content");

	tabs.forEach((tab) => {
		tab.addEventListener("click", () => {
			const activeService = tab.dataset.service;
			console.log(activeService);

			tabs.forEach((tab) => {
				if (tab.dataset.service === activeService) {
					tab.classList.add("active");
				} else {
					tab.classList.remove("active");
				}
			});

			tabContent.forEach((tab) => {
				if (tab.dataset.service === activeService) {
					tab.classList.add("active");
				} else {
					tab.classList.remove("active");
				}
			});
		});
	});
}
