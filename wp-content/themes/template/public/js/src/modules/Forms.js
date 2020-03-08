import { formConfig } from '../settings.js';
import AddHandlerForEvent from "../Controllers/AddHandlerForEvent";
import xhr from 'xhr';

export default class CarouselWrapper {
    constructor()
    {
        this.settings =  formConfig.selectors;

        this.forms = this.settings.forms;
        if(this.forms)
        {
            this.forms.forEach(item=>{
                new AddHandlerForEvent(item,'submit',event=>{

                    event.preventDefault();

                    this.handler(event.target);

                })
            });
        }
    }

    set forms(value)
    {

        this._forms = document.querySelectorAll(value);
    }

    get forms()
    {
        return this._forms;
    }

   async handler(form)
    {
        const inputs = form.querySelectorAll('input');
        const button = form.querySelector(this.settings.send);
        let data = {};
        data.action = 'send_form';
        inputs.forEach(item=>{
            data[item.getAttribute('data-name')] = item.value;
        });

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            method: "POST",
            data: data,
            complete: ()=>{
                button.style.display = 'none';
                form.querySelector('.response').style.display = 'block';
            },
        });

    }
}
