gsap.to("html", {
	autoAlpha: 1,
});

// Creating new styles for buttons
wp.domReady(() => {
	wp.blocks.registerBlockStyle("core/button", [
		{
			name: "arrow-down",
			label: "Arrow Down",
		},
		{
			name: "long-button",
			label: "Long Button",
		},
	]);

	wp.blocks.registerBlockStyle("core/button", [
		{
			name: "social-media",
			label: "Social media link",
		},
	]);

	wp.blocks.registerBlockStyle("core/image", [
		{
			name: "yellow-border",
			label: "Yellow border",
		},
	]);

	wp.blocks.registerBlockStyle("acf/container", [
		{
			name: "small",
			label: "Small",
		},
		{
			name: "wide",
			label: "Wide",
		},
	]);

	wp.blocks.registerBlockStyle("acf/columns-container", [
		{
			name: "wide",
			label: "Wide",
		},
	]);

	wp.blocks.registerBlockStyle("core/heading", [
		{
			name: "small",
			label: "Small",
		},
	]);
	// wp.blocks.registerBlockStyle("core/button", [
	// 	{
	// 		name: "default",
	// 		label: "Default",
	// 	},
	// ]);
	// wp.blocks.registerBlockStyle("core/image", [
	//     {
	//         name: "border",
	//         label: "Border",
	//     },
	// ]);
});
