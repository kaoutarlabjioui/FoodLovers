<?php
namespace App\Services;

use App\Repositories\AddressRepositoryInterface;
use App\Services\IAddressService;

class AddressService implements IAddressService
{
    public function __construct(protected AddressRepositoryInterface $addressRepo) {}

    public function getAll() {
        return $this->addressRepo->getAll();
    }

    public function getById($id) {
        return $this->addressRepo->getById($id);
    }

    public function create(array $data) {


        return $this->addressRepo->create($data);
    }

    public function update($id, array $data) {
        return $this->addressRepo->update($id, $data);
    }

    public function delete($id) {
        return $this->addressRepo->delete($id);
    }
}


