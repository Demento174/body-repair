import 'selectize/dist/js/standalone/selectize.min.js';
import AddHandlerForEvent from "../../Controllers/AddHandlerForEvent";
import FilterElements from "./FilterElements";
import AddFilter from "./AddFilter";
import RemoveFilter from "./RemoveFilter";
import Search from "./Search.js ";

export default class FilterIndex extends FilterElements{
    constructor(options={})
    {
        super(options);

        if(this.items.length > 0)
        {
            this.handler();

            this.startActivateFilter();

        }
    }


    startActivateFilter()
    {
        if(this.selectizeController[0].value !== '0')
        {
            new AddFilter(this.selectizeController[0].value);
        }

        if(document.querySelector('.catalog__filter__group input:checked'))
        {
            new AddFilter(document.querySelector('.catalog__filter__group input:checked').getAttribute(this.settings.attributeId));
        }
    }


    handler()
    {

        this.selectizeController =this.markControl.selectize(
            {
                onChange:(value)=>
                {
                    if(value !== '0')
                    {
                        new AddFilter(value);
                    }

                }
            }
        );

        new AddHandlerForEvent(this.detailControl,'change',(event)=>{
            new AddFilter(event.target.getAttribute(this.settings.attributeId));

        });

        new AddHandlerForEvent(this.removeButtons,'click',event=>
        {
            new RemoveFilter(event.target.getAttribute(this.settings.attributeId));
        });

        new AddHandlerForEvent(this.searchBtn,'click',(event)=>
        {
            event.preventDefault();
            new Search(this.searchInput.value);
        });
    }
}