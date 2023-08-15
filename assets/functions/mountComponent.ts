import { createApp, Component } from "vue"

export function mountComponent(
    rootElement: string,
    rootComponent: Component,
    rootProps?: Record<string, unknown> | null
) {
    createApp(rootComponent, rootProps).mount(rootElement)
}