<?php


namespace App\Repositories;

use App\Models\Address;
use App\Repositories\AddressRepositoryInterface;

class AddressRepository implements AddressRepositoryInterface
{
  


    public function getAll() {
        return Address::all();
    }

    public function getById($id) {
        return Address::findOrFail($id);
    }

    public function create(array $data) {
        // dd($data);
        return Address::create($data);
    }

    public function update($id, array $data) {
        $address = Address::findOrFail($id);
        $address->update($data);
        return $address;
    }

    public function delete($id) {
        $address = Address::findOrFail($id);
        return $address->delete();
    }
}
