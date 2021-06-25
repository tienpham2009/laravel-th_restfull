<?php


namespace App\Service\Impl;


use App\Repository\CustomerRepositoryImpl;
use App\Service\CustomerServiceImpl;
use function Symfony\Component\String\s;

class CustomerService implements CustomerServiceImpl
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryImpl $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        return $this->customerRepository->getAll();
    }


    public function findById($id)
    {
        $customer = $this->customerRepository->findById($id);

        $statusCode = 200;
        if (!$customer) {
            $statusCode = 404;
        }

        return [
            'statusCode' => $statusCode,
            'customer' => $customer
        ];
    }

    public function create($request)
    {
        $customer = $this->customerRepository->create($request);

        $statusCode = 201;
        if (!$customer) {
            $statusCode = 500;
        }

        return [
            'statusCode' => $statusCode,
            'customer' => $customer
        ];
    }

    public function update($request, $id)
    {
       $oldCustomer = $this->customerRepository->findById($id);

       if (!$oldCustomer){
           $statusCode = 404;
           $newCustomer = null;
       }else{
           $newCustomer = $this->customerRepository->update($request , $oldCustomer);
           $statusCode = 202;
       }

       return [
           'statusCode' => $statusCode,
           'newCustomer' => $newCustomer
       ];
    }

    public function destroy($id)
    {
        $customer = $this->customerRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($customer) {
            $this->customerRepository->destroy($customer);
            $statusCode = 200;
            $message = "Delete success!";
        }

        return [
            'statusCode' => $statusCode,
            'message' => $message
        ];
    }
}
