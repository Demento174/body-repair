// import { getXmlHttp } from "../../common";
import { action_AJAX } from "../settings";

export default class WordPressAJAX {


    constructor(action,data,callback = false)
    {
        this.action = action;
        if(this.action)
        {

            this.data = data;
            this.XML = false;
            this.callback = callback;


            this.handler();
        }else
            {
                console.error('Action not define');
            }

    }

    set action(action)
    {
        this._action = action_AJAX[action];
    }

    get action()
    {
        return this._action;
    }


    set data(values)
    {

        this._data = new FormData();

        for (let key in values)
        {

            this._data.append(key,values[key]);

        }

        this._data.append("action",this.action);


    }

    get data()
    {
        return this._data;
    }

    set XML(value)
    {
            let xmlhttp;

            try
            {

                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

            }
            catch (e)
            {
                try
                {

                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

                }
                catch (E)
                {

                    xmlhttp = false;
                }
            }

            if (!xmlhttp && typeof XMLHttpRequest!='undefined')
            {
                xmlhttp = new XMLHttpRequest();
            }

            this._XML =  xmlhttp;

        }


    get XML()
    {
        return this._XML;
    }

    set callback(func)
    {
        this._callback = !func?(response)=>{console.log(`Ответ сервера: ${response}`);}:func;
    }

    get callback()
    {
        return this._callback;
    }

   handler()
   {


        this.XML.onreadystatechange = ()=> {

            if (this.XML.readyState == 4)
            {


                // console.log(this.XML.statusText);
                if(this.XML.status == 200) {

                    this.callback(this.XML.response);
                }

            }
        };
        this.XML.open('POST', ajax.url, true);

        this.XML.send(this.data);
    }

}
