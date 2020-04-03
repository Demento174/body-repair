import { replaceInputValue } from "../settings";
import AddHandlerForEvent from "../Controllers/AddHandlerForEvent";

export default class ReplaceInputValue {
    constructor(settings={})
    {
        this.settings =  JSON.stringify(settings) == '{}'?replaceInputValue:settings;
        this.elements = `[${replaceInputValue.attributes.target}][${replaceInputValue.attributes.value}]`;
        this.elements.forEach(element=>
        {
            const target = document.querySelector(element.getAttribute(replaceInputValue.attributes.target));
            const value = element.getAttribute(replaceInputValue.attributes.value);
            const attribute = element.hasAttribute(this.settings.attributes.attribute)?element.getAttribute(this.settings.attributes.attribute):'value';

            if(target)
            {
                new AddHandlerForEvent(element,'click',event=>{

                    this.handler(target,value,attribute);
                });
            }
        });
    }

    set elements(selector)
    {
        this._elements = document.querySelectorAll(selector);
    }

    get elements()
    {
        return this._elements;
    }

    handler(target,value,attribute = 'value')
    {
        console.log(target,value,attribute);
        target.setAttribute(attribute,value);
    }
}