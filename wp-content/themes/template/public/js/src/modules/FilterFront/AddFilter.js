import FilterElements from "./FilterElements";
import AssemblyWrapper from "./AssemblyWrapper";


export default class AddFilter extends FilterElements{
    constructor(id)
    {
        super();
        this.id = id;
        this.displayBlockFilter();
        this.itemsHidden();
    }
    displayBlockFilter()
    {
        const activeBlock =  document.querySelector(`${this.settings.selectors.filterBlock}[${this.settings.attributeId}="${this.id}"]`);
        if(activeBlock)
        {
            activeBlock.style.display = this.settings.displaysStyle.detailsControl;
        }else
        {
            console.log(`Нет блока фильтра с id ${this.id}`);
        }
    }

    itemsHidden()
    {

        this.items.forEach(item=>
        {
            const arrayId =  item.getAttribute(this.settings.attributeCats).split(',');
            let attributeNone = item.getAttribute(this.settings.attributeNone);
            let attributeActive = item.getAttribute(this.settings.attributeActive);

            if(arrayId.indexOf(this.id) === -1 && attributeActive === '')
            {
                item.style.display = 'none';

                item.setAttribute(this.settings.attributeNone,attributeNone !==''?`${attributeNone},${this.id}`:this.id);
            }else
                {
                    item.style.display = this.settings.displaysStyle.item;
                    item.setAttribute(this.settings.attributeNone,'');
                    item.setAttribute(this.settings.attributeActive,attributeActive !==''?`${attributeActive},${this.id}`:this.id)
                }
        });

        new AssemblyWrapper();

    }


}