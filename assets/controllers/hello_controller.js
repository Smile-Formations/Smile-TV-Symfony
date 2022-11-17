import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {

    interval;

    connect() {
        this.element.textContent = this.time()

        this.interval = setInterval(() => {
            this.element.textContent = this.time()
        }, 1000)
    }

    time() {
        return new Date().toLocaleTimeString()
    }
}
