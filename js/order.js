document.querySelector('button[type="button"]').addEventListener('click', function() {
    let mouse_event = new MouseEvent('click', {
        bubbles: true,
        cancelable: true,
        view: window
    })
    document.querySelector('#order').dispatchEvent(mouse_event);
});