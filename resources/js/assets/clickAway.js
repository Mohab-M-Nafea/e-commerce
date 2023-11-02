const ClickAway = {
    beforeMount(el, binding) {
        const handleClickAway = (event) => {
            if (!el.contains(event.target)) {
                binding.value();
            }
        };

        document.addEventListener("click", handleClickAway);
        el.clickAwayHandler = handleClickAway;
    },
    unmounted(el) {
        document.removeEventListener("click", el.clickAwayHandler);
        delete el.clickAwayHandler;
    },
};

export default ClickAway;
// ClickOutsideDirective.js
// const ClickOutsideDirective = {
//     beforeMount(el, binding) {
//         // Define a function to handle clicks outside the element
//         const handleClickOutside = (event) => {
//             if (!el.contains(event.target)) {
//                 // Call the provided expression when a click outside occurs
//                 binding.value();
//             }
//         };
//
//         // Attach the event listener on mount
//         document.addEventListener("click", handleClickOutside);
//         el._clickOutsideHandler = handleClickOutside;
//     },
//     unmounted(el) {
//         // Clean up the event listener when the component is unmounted
//         document.removeEventListener("click", el._clickOutsideHandler);
//         delete el._clickOutsideHandler;
//     },
// };
//
// export default ClickOutsideDirective;
