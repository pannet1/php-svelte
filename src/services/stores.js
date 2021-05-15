import { writable } from 'svelte/store';

function info() {
    const { subscribe, set }  = writable(0)

    return {
        subscribe,
        setter: () => set(n => n)
    }
}

export const member = info()
