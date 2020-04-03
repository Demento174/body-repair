import 'bootstrap/dist/js/bootstrap.js';
import '../../libs/awesome/src.js';
import '../../less/style.less';
import AddProductToCart from "./Controllers/WC/AddProductToCart.js ";
import Forms from "./modules/Forms";
import ReplaceInputValue from "./modules/ReplaceInputValue";
import WrapperMap from "./modules/WrapperMap";
import LoadMorePortfolio from "./modules/LoadMorePortfolio";
import NumberDivision from "./modules/NumberDivision";
import Pagination from "./modules/Pagination";
import FilterIndex from "./modules/FilterFront/FilterIndex";
import RemoveProductFromCart from "./Controllers/WC/ RemoveProductFromCart";
import ChangeQuantityInCart from "./Controllers/WC/ChangeQuantityInCart";
import AddHandlerForEvent from "./Controllers/AddHandlerForEvent";

import { getParent } from "./common";

document.addEventListener('DOMContentLoaded',
    ()=>
    {
        new AddProductToCart();

        new Forms();

        new ReplaceInputValue();

        new WrapperMap();

        new LoadMorePortfolio();

        new NumberDivision();

        new Pagination();

        new FilterIndex();

        new RemoveProductFromCart();

        new ChangeQuantityInCart();

        (((btns,input,btnBuy,btn_toBook)=>{ // --- Установление количества заказаного товара на странице товара
            if(!btns)
            {
                return;
            }

            new AddHandlerForEvent(btns,'click',(event)=>{
                const btn = getParent(event.target,'button');
                let value = Number(input.value);

                if(btn.classList.contains('plus'))
                {
                    input.value = value++;
                }else
                {
                    input.value = value--;
                }

                btnBuy.setAttribute('data-quantity',value);
                btn_toBook.setAttribute('data-quantity',value);
            });
        })( document.querySelectorAll('.btn__quantity'),
            document.querySelector('input.quantityValue'),
            document.querySelector('.btn__buy'),
            document.querySelector('.btn_to_book')))

        //---- присвоение значений инпутам формы на странице товара
        const buttonOpenModalForm  = document.querySelector('.btn_to_book');
        if(buttonOpenModalForm)
        {
            new AddHandlerForEvent(buttonOpenModalForm,'click',event=>
            {
                const modal  = document.querySelector(buttonOpenModalForm.getAttribute('data-target'));
                modal.querySelector('input[data-name="form"]').value = buttonOpenModalForm.getAttribute('data-form');
                modal.querySelector('input[data-name="product"]').value = buttonOpenModalForm.getAttribute('data-product');
                modal.querySelector('input[data-name="number"]').value = buttonOpenModalForm.getAttribute('data-number');
                modal.querySelector('input[data-name="quantity"]').value = buttonOpenModalForm.getAttribute('data-quantity');
            });
        }




    });

