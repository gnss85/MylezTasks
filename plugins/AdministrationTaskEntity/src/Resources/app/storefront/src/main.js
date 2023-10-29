import QuestionPlugin from "./question-plugin/question-plugin.plugin";

const PluginManager = window.PluginManager;
PluginManager.register("QuestionPlugin", QuestionPlugin, "[data-question-plugin]");
