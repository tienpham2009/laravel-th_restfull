<?php


namespace App\Repository\Impl;


use App\Models\Customer;
use App\Repository\CustomerRepositoryImpl;
use App\Repository\Eloquent\EloquentRepository;

class CustomerRepository extends EloquentRepository implements CustomerRepositoryImpl
{
    public function getModel()
    {
        return Customer::class;
    }
}
