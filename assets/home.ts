import {mountComponent} from "./functions/mountComponent";
import App from "./vue/pages/index.vue";

const rootElement = document.getElementById("vue-app");

if (null === rootElement) {
    throw Error("Undefined root element")
}

mountComponent("#vue-app", App, {})