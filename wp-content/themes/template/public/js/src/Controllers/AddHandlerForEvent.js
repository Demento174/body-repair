export default class AddHandlerForEvent{
    constructor( object, event, handler, useCapture = false)
    {
        if (object.addEventListener)
        {

            object.addEventListener(event, handler, useCapture);
        }
        else if (object.attachEvent)
        {
            object.attachEvent('on' + event, handler);
        } else
        {
            console.error("Add handler is not supported");
        }

    }
}
