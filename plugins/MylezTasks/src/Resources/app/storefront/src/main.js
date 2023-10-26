import buttonFeedback from "./scripts/button-feedback";

const PluginManager = window.PluginManager;
PluginManager.override("AddToCart", buttonFeedback, "[data-add-to-cart]");
