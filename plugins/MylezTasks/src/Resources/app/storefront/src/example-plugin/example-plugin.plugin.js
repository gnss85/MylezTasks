// <plugin root>/src/Resources/app/storefront/src/example-plugin/example-plugin.plugin.js
import Plugin from "src/plugin-system/plugin.class";

export default class ExamplePlugin extends Plugin {
    init() {
        window.addEventListener("scroll", this.onScroll.bind(this));
        console.info("plugin loaded");
    }

    onScroll() {
        if (
            window.innerHeight + window.pageYOffset >=
            document.body.offsetHeight
        ) {
            alert("Seems like there's nothing more to see here.");
        }
    }
}
