<?php

namespace app\product;

interface InterfaceProduct
{
    const BASIC_PRODUCT_TYPE = 'basic';
    const UNIQUE_PRODUCT_TYPE = 'unique';
    const ADDITIONAL_PRODUCT_TYPE = 'additional';

    public function getType();
}