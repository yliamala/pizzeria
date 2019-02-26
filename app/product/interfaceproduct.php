<?php

namespace app\product;

interface InterfaceProduct
{
    const BASIC_PRODUCT = 'basic';
    const UNIQUE_PRODUCT = 'unique';
    const ADDITIONAL_PRODUCT = 'additional';

    public function getPrice();

    public function getDescription();

    public function getType();
}