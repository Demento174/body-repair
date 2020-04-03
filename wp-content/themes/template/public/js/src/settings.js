export const Config =
    {
        modules:
            {
                numberDivision:
                    {
                        selector:'.number-division'
                    },
                mapWrapper:
                    {
                        selector:'.s_info__map',
                        mapWrapperContent:"Нажмите,что бы воспользоваться картой"
                    },
                FilterItems:
                    {
                        selectors:
                            {
                                filterBlock:'.catalog__current_filters__itm',
                                filterBlockMarkClass:'mark',
                                filterBlockDetailClass:'detail',
                                marksControl:'.catalog__filter__select',
                                detailsControl:'.catalog__filter__group input',
                                mainWrapper : '.catalog__list',
                                wrappers:'.catalog__list .wrapper',
                                items:'.catalog__itm',
                                itemTitle:'.catalog__itm__title',
                                hiddenItems:'.hidden_items',
                                removeButtons:'.remove_btn',
                                removeButtonWrapper:'.catalog__current_filters__itm',
                                searchBtn:'.catalog__search__submit',
                                searchInput:'.catalog__search__input',
                            },
                        displaysStyle:
                            {
                                detailsControl:'inline-flex',
                                item:"flex"
                            },
                        attributeId:'data-id',
                        attributeNone:'data-none',
                        attributeActive:'data-active',
                        attributeCats:'data-cats',
                        attributePaginationQuantity:'data-paginationQuantity'
                    },
                loadMorePortfolio:
                    {
                        selectors:
                            {
                                items:'.s_portfolio__list .s_portfolio__itm',
                                btn:'.btn_more_portfolio',
                            },
                        count:3

                    },
                pagination:
                    {
                        selectors:
                            {
                                wrapper:'.catalog__pager',
                                list:'ul',
                                item:'li',
                                prev:'.catalog__pager__prev',
                                next:'.catalog__pager__next',
                                pages:'.catalog__list .wrapper',
                            },
                        activeClass:'active',
                        attribute:'data-number'

                    },
            },
    };



export const  formConfig =
    {
        'selectors' :
            {
                'forms':'form._form',
                'send':'.send',
                'response':'.response',
            },
         'action': 'send_form'
    };

export const replaceInputValue =
    {
        attributes:
            {
                target:'data-replace-target',
                value:'data-replace-value',
                attribute:'data-replace-attribute'
            }
    };

export const WooCommerceConfig =
    {
        AddProductToCart :
            {
                buttonAdd:
                    {
                        selector:'.btn__buy',
                        attributeId:'data-id',
                        attributeQuantity:'data-quantity'
                    },
                messageBlock:'.messageAfterBuy'

            },
        RemoveProductFromCart :
            {
                buttonRemove:
                    {
                        selector:'.btn__remove',
                        attributeId:'data-id',
                    },
                    basketItemSelector:'.s_catr__itm',
            },
        changeQunatityInCart:
            {
              selectors:
                  {
                      btnAdd:'.cnt_input__btns .plusProduct',
                      btnMinus:'.cnt_input__btns .minusProduct',
                      basketItem:'.s_catr__itm',
                      input:'.cnt_input input',
                      classAdd:'plus',
                      classMinus:'minus',
                  },
                attributeId:'data-id',
            },
        Cart:
            {
                selectors:
                    {
                        quantityElement:'.header__cart__cnt',
                        amountWrapper:'.header__cart__val',
                        amountElement:'.header__cart__val b',
                        amountEmpty:'.header__cart__val p',
                        amountCartPage:'.s_catr__total b'
                    },
                emptyText:'Ваша корзина пуста',
            }

    };

export const action_AJAX =
    {
        'add_to_cart':'woocommerce_add_to_cart',
        'removeFromBasket':'removeFromBasket',
        'quantity_in_cart':'cart_items_count',
        'cart_amount':'cart_amount',
        'changeQuantityInCart':'changeQuantityInCart',
    };