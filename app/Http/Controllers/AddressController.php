<?php

namespace App\Http\Controllers;

use App\Repositories\AddressRepositoryInterface;
use App\Services\IAddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(protected AddressRepositoryInterface $addressRepo) {}

    public function index() {
        $addresses = $this->addressRepo->getAll();

    }


    public function store(Request $request) {
        // dd($request);
        $this->addressRepo->create($request->all());
        
    }

    public function edit($id) {
        $address = $this->addressRepo->getById($id);

    }

    public function update(Request $request, $id) {
        $this->addressRepo->update($id, $request->all());

    }

    public function destroy($id) {
        $this->addressRepo->delete($id);

    }
}

