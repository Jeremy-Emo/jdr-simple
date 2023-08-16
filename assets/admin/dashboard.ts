import {mountComponent} from "../functions/mountComponent";
import Dashboard from "../vue/pages/admin/dashboard.vue";

const rootElement = document.getElementById("vue-app");

if (null === rootElement) {
    throw Error("Undefined root element")
}

mountComponent("#vue-app", Dashboard, {})